<?php

namespace App\Http\Responses\Frontpage\Checkout\Product;

use App\Helpers\Config;
use App\Jobs\SendPaymentNotificationEmail;
use App\Models\Cart;
use App\Models\CartDetailProduct;
use App\Models\CartDetailProductAddon;
use App\Models\Participant;
use App\Models\ProductItem;
use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class PaymentResponse implements Responsable
{
    public $xendit_api_key;
    public $xendit_token_callback;
    public $payment_channel;
    public $invoice_duration;
    public $apiInstance = null;
    public $environtment = null;
    public $api_key_development = null;
    public $api_key_production = null;

    public function __construct() {
        $mode = Config::getConfig('PAYMENT_GATEWAY', 'PAYMENT_GATEWAY_MODE');
        if($mode == 'PRODUCTION') {
            $this->xendit_api_key = Config::getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_API_KEY_PRODUCTION');
            $this->xendit_token_callback = Config::getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_PRODUCTION');
        } else {
            $this->xendit_api_key = Config::getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_API_KEY_DEVELOPMENT');
            $this->xendit_token_callback = Config::getConfig('PAYMENT_GATEWAY', 'XENDIT_PAYMENT_GATEWAY_TOKEN_CALLBACK_DEVELOPMENT');
        }
        Configuration::setXenditKey($this->xendit_api_key);
        $this->apiInstance = new InvoiceApi();

        $this->payment_channel = ["BCA", "BNI", "BSI", "BRI", "MANDIRI"];
        $this->invoice_duration = 3600; // in second (1 hour)
    }

    public function toResponse($request)
    {
        try {
            $data = DB::transaction(function () use ($request) {
                return $this->process($request);
            });

            if($data['code'] == 200) {
                return redirect($data['data']['checkout_link']);
            }  else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function process($request)
    {
        $items = [];

        // dd($request->all()['buyer_firstname']);

        $check_buyer = Participant::where('whatsapp', $request->buyer_phone)
                        ->first();

        if(empty($check_buyer)) {
            $cek_participant = Participant::where('email', $request->buyer_email)->first();
            if(!empty($cek_participant)) {
                throw new \Exception('Email ini sudah digunakan. Gunakan email lainnya.');
            }
            $store_buyer = Participant::create([
                'name' => $request->buyer_firstname,
                'lastname' => $request->buyer_lastname,
                'fullname' => $request->buyer_fullname_title,
                'whatsapp' => $request->buyer_phone,
                'email' => $request->buyer_email,
                'participant_category_id' => $request->buyer_category,
                'participant_sub_category_id' => $request->buyer_subcategory,
                'username' => explode('@', $request->buyer_email)[0].date('YmHi'),
                'password' => Hash::make('password'),
                'status' => 'active',
                'gender' => $request->buyer_gender,
                'birthdate' => $request->buyer_birthdate,
                'address' => $request->buyer_address,
                'created_at' => now(),
            ]);
        } else {
            $check_buyer->name = $request->buyer_firstname;
            $check_buyer->lastname = $request->buyer_lastname;
            $check_buyer->fullname = $request->buyer_fullname_title;
            // $check_buyer->whatsapp = $request->buyer_phone;
            // $check_buyer->email = $request->buyer_email;
            $check_buyer->participant_category_id = $request->buyer_category;
            $check_buyer->participant_sub_category_id = $request->buyer_subcategory;
            $check_buyer->gender = $request->buyer_gender;
            $check_buyer->birthdate = $request->buyer_birthdate;
            $check_buyer->address = $request->buyer_address;
            $check_buyer->updated_at = now();
            $check_buyer->save();
        }

        $cart = Cart::create([
            'uuid' => (string) Str::uuid(),
            'participant_id' => !empty($check_buyer) ? $check_buyer->id : $store_buyer->id,
            'item_type' => 'product',
            'status' => 'checkedout',  //(in_cart|in_process|checkedout)

        ]);

        $check_product = ProductItem::where('code', $request->product_code)->first();

        $cart_product = CartDetailProduct::create([
            'cart_id' => $cart->id,
            'item_id' => $check_product->id,
            'json_other_information' => null,
            'participant_id' => !empty($check_buyer) ? $check_buyer->id : $store_buyer->id,
        ]);

        if(isset($request->product_addons) && count($request->product_addons) > 0) {

            foreach($request->product_addons as $key => $addon) {
                CartDetailProductAddon::create([
                    'cart_detail_id' => $cart_product->id,
                    'item_addon_id' => $addon,
                    'created_at' => now(),
                ]);
            }
        }

        $trx = Transaction::create([
            'uuid' => (string) Str::uuid(),
            'cart_id' => $cart->id,

            'participant_id' => !empty($check_buyer) ? $check_buyer->id : $store_buyer->id,
            'payer_name' => $request->buyer_firstname . ' ' . $request->buyer_lastname,
            'payer_phone' => $request->buyer_phone,
            'payer_email' => $request->buyer_email,
            'payer_address' => $request->buyer_address,

            'voucher_id' => null,
            'discount' => null,
            'tax' => null,

            'admin' => $request->admin_fee,
            'sub_total' => $request->sub_total,
            'grand_total' => $request->grand_total,
            'curency' => $request->currency,

            'status' => 'PENDING',  //(settled|pending|paid|expired)
            'note' => 'Telah Menyetujui Syarat & Ketentuan yang berlaku.',  //(settled|pending|paid|expired)
            'created_at' => now(),
        ]);

        $items = [
            [
                "name" => $check_product->name_id,
                "quantity" => 1,
                "price" => number_format($check_product->price_idr, 0, '', ''),
                "url" => route('fe.program.preview',[
                    $check_product->product->program->slug, // slug program
                    $check_product->slug_id // slug item produknya
                ])
            ]
        ];

        $invoice = $this->createInvoice([
            'request' => $request,
            'trx_id' => $trx->id,
            'items' => $items
        ]);

        SendPaymentNotificationEmail::dispatch($request->all(), $check_product, $invoice);


        return $invoice;
    }

    private function createInvoice($data)
    {
        $params = [
            'transaction_id' => $data['trx_id'],
            // 'external_id' => (string) Str::uuid(),
            'external_id' => $this->generateInvNumber(),
            'payer_email' => $data['request']->buyer_email,
            // 'description' => $data['request']->description,
            'customer' => [
                'given_names' => $data['request']->buyer_firstname ?? '',
                'email' => $data['request']->buyer_email ?? '',
                'mobile_number' => $data['request']->buyer_phone ?? '',
            ],
            'amount' => (int)$data['request']->grand_total,
            'invoice_duration' => $this->invoice_duration,
            'currency' => $data['request']->currency,
            'items' => $data['items'],
            'payment_methods' => $this->payment_channel,
            'success_redirect_url' => route('fe.payment-paid'),
            "customer_notification_preference" => [
                "invoice_created" => [
                    // "whatsapp",
                    // "email",
                    // "viber"
                ],
                "invoice_reminder" => [
                    // "whatsapp",
                    // "email",
                    // "viber"
                ],
                "invoice_paid" => [
                    // "whatsapp",
                    // "email",
                    // "viber"
                ]
            ]
            // 'failure_redirect_url' => $request->failure_redirect_url
        ];

        if($data['request']->admin_fee) {
            $params['fees'] = [
                [
                    "type" => "ADMIN",
                    "value" => $data['request']->admin_fee,
                ]
            ];
        }

        $create_invoice_request = new \Xendit\Invoice\CreateInvoiceRequest($params);
        $result = $this->apiInstance->createInvoice($create_invoice_request);

        // Save to database
        $payment = new Payment;
        $payment->transaction_id    = $params['transaction_id'];
        $payment->external_id       = $params['external_id'];
        $payment->payer_name        = $data['request']->buyer_firstname;
        $payment->payer_phone       = $data['request']->buyer_phone;
        $payment->payer_email       = $data['request']->buyer_email;
        // $payment->note              = $request->description;
        $payment->status            = 'PENDING';
        $payment->checkout_link     = $result['invoice_url'];
        $payment->amount            = $params['amount'];
        $payment->save();

        return [
            'code' => 200,
            'data' => [
                'checkout_link' => $result['invoice_url']
            ],
            'result' => $result
        ];
    }

    // private function generateInvNumber()
    // {
    //     // Ambil invoice terakhir
    //     $latest_inv = Payment::latest()->first();

    //     // Ambil tahun saat ini
    //     $current_year = date('Y');

    //     // Jika tidak ada invoice sebelumnya atau tahun invoice terakhir bukan tahun saat ini, mulai dari 1
    //     if (!$latest_inv || explode('_', $latest_inv->external_id)[0] != $current_year) {
    //         return $current_year . '_F_0001'; // Contoh: 2024_F_0001
    //     }

    //     // Parsing nomor urut dari invoice terakhir
    //     $latest_inv_number = explode('_', $latest_inv->external_id)[2];

    //     // Jika tahun invoice terakhir sama dengan tahun saat ini
    //     if (explode('_', $latest_inv->external_id)[0] == $current_year) {
    //         // Cek jika nomor urut melebihi 9999, reset ke 1
    //         if ($latest_inv_number >= 9999) {
    //             $next_inv_number = '0001';
    //         } else {
    //             // Tambahkan 1 ke nomor urut yang ada
    //             $next_inv_number = str_pad($latest_inv_number + 1, 4, '0', STR_PAD_LEFT);
    //         }
    //     } else {
    //         // Jika tahun invoice terakhir tidak sama dengan tahun saat ini, mulai dari 1
    //         $next_inv_number = '0001';
    //     }

    //     // Format nomor invoice berikutnya
    //     $next_inv = $current_year . '_F_' . $next_inv_number;

    //     return $next_inv;
    // }

    private function generateInvNumber()
    {
        // Ambil invoice terakhir
        $latestInv = Payment::latest()->first();

        // Ambil tahun saat ini
        $currentYear = date('Y');

        // Jika tidak ada invoice sebelumnya atau tahun invoice terakhir bukan tahun saat ini, mulai dari 1
        if (!$latestInv || substr($latestInv->external_id, 0, 4) != $currentYear) {
            return $currentYear . 'F0001'; // Contoh: 2024F0001
        }

        // Parsing nomor urut dari invoice terakhir
        $latestInvNumber = (int)substr($latestInv->external_id, 5);

        // Jika tahun invoice terakhir sama dengan tahun saat ini
        if (substr($latestInv->external_id, 0, 4) == $currentYear) {
            // Cek jika nomor urut melebihi 9999, reset ke 1
            if ($latestInvNumber >= 9999) {
                $nextInvNumber = '0001';
            } else {
                // Tambahkan 1 ke nomor urut yang ada
                $nextInvNumber = str_pad($latestInvNumber + 1, 4, '0', STR_PAD_LEFT);
            }
        } else {
            // Jika tahun invoice terakhir tidak sama dengan tahun saat ini, mulai dari 1
            $nextInvNumber = '0001';
        }

        // Format nomor invoice berikutnya
        $nextInv = $currentYear . 'F' . $nextInvNumber;

        return $nextInv;
    }

}
