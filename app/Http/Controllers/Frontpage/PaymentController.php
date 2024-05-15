<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class PaymentController extends Controller
{
    public function invoice(Request $request)
    {
        try {
            $trx = Transaction::where('inv_number', $request->inv)->first();

            if(empty($trx)) throw new \Exception("Invoice {$request->inv} tidak ditemukan !");

            return view('pages.public.invoice.index', [
                'invoice' => $trx
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function proof_payment(Request $request)
    {
        $request->validate([
            'inv_number' => 'required|max:100',
            'proof_payment' => 'required|image|mimes:jpeg,png,jpg|max:5120', // maksimal 5MB
        ], [
            'inv_number.required' => 'Nomor invoice wajib diisi.',
            'inv_number.max' => 'Nomor invoice tidak boleh lebih dari 100 karakter.',
            'proof_payment.required' => 'Bukti pembayaran wajib diunggah.',
            'proof_payment.image' => 'Bukti pembayaran harus berupa gambar.',
            'proof_payment.mimes' => 'Bukti pembayaran harus dalam format jpeg, png, atau jpg.',
            'proof_payment.max' => 'Ukuran bukti pembayaran tidak boleh melebihi 5 MB.',
        ]);

        try {

            $inv = Transaction::where('inv_number', $request->inv_number)->first();

            if(empty($inv)) throw new \Exception('Invoice tidak ditemukan !');

            DB::transaction(function () use ($request, $inv) {
                Transaction::where('id', $inv->id)
                ->update([
                    'payment_proof' => $this->upload_image($request),
                    'payment_proof_date' => now(),
                    'updated_at' => now()
                ]);
            });
            return redirect()
                ->route('fe.payment-invoice', [
                    'inv' => $inv->inv_number
                ])
                ->with('success', 'Bukti pembayaran berhasil dikirim, sedang dicek oleh Admin.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        try {
            $trx = DB::transaction(function () use ($request) {
                return $this->checkout_payment($request);
            });
            return redirect()
                ->route('fe.payment-invoice', [
                    'inv' => $trx->inv_number
                ])
                ->with('success', 'Pesanan berhasil dibuat. Harap Segera lakukan pembayaran sesuai dengan invoice berikut.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function checkout_payment($request)
    {
        $request->validate([
            'buyer_agree_terms' => 'required',
            'buyer_name' => 'required|min:2|max:80',
            'buyer_email' => 'required|min:2|max:80',
            'buyer_whatsapp' => 'required|min:10|max:14',
            'package' => 'required',
            'qty_request' => 'required',
            'price_amount' => 'required',
        ], [
            'buyer_agree_terms.required' => 'Anda harus menyetujui syarat dan ketentuan.',
            'buyer_name.required' => 'Nama pembeli wajib diisi.',
            'buyer_name.min' => 'Nama pembeli minimal terdiri dari :min karakter.',
            'buyer_name.max' => 'Nama pembeli tidak boleh lebih dari :max karakter.',
            'buyer_email.required' => 'Email pembeli wajib diisi.',
            'buyer_email.min' => 'Email pembeli minimal terdiri dari :min karakter.',
            'buyer_email.max' => 'Email pembeli tidak boleh lebih dari :max karakter.',
            'buyer_whatsapp.required' => 'Nomor WhatsApp pembeli wajib diisi.',
            'buyer_whatsapp.min' => 'Nomor WhatsApp pembeli minimal terdiri dari :min karakter.',
            'buyer_whatsapp.max' => 'Nomor WhatsApp pembeli tidak boleh lebih dari :max karakter.',
            'package.required' => 'Paket yang dipilih wajib dipilih.',
            'qty_request.required' => 'Jumlah yang diminta wajib diisi.',
            'price_amount.required' => 'Harga wajib diisi.',
        ]);

        $package = Package::where('id', $request->package)->first();

        if(empty($package)) throw new \Exception('Paket tidak ditemukan !');

        $total_amount = (int)$request->qty_request * (int)$package->price;

        $invoice_number = $this->get_latest_code_invoice();

        $payload = [
            'name' => $request->buyer_name,
            'email' => $request->buyer_email,
            'whatsapp' => $request->buyer_whatsapp,
            'buyer_agree_terms' => !empty($request->buyer_agree_terms) ? 1 : 0, // 1:agree, 0: not agree

            'date' => date('Y-m-d'),
            'inv_number' => $invoice_number,

            'package_id' => $package->id,
            'item_name' => $package->name,
            'unit_price' => $package->price,
            'qty' => $request->qty_request,
            'amount' => $total_amount,

            'payment_method' => 'MANUAL_TRANSFER',
            'status' => 'PENDING',
            'created_at' => now(),
        ];

        $store = Transaction::create($payload);

        return $store;
    }

    private function get_latest_code_invoice()
    {
        $latest_invoice = Transaction::latest()->first();
        $latest_code = $latest_invoice ? $latest_invoice->inv_number : null;

        $latest_number = 0; // Tetapkan nilai default untuk $latest_number

        if ($latest_code) {
            $latest_number = (int)substr($latest_code, -4);

            if ($latest_number >= 9999) {
                $new_number = $latest_number + 1;
            } else {
                $new_number = $latest_number + 1;
            }
        } else {
            $new_number = 1;
        }

        // Hitung panjang dari nomor invoice yang akan dibuat sekarang
        $invoice_length = strlen((string)$new_number);

        $new_code = 'INV-TIGATEK-' . str_pad($new_number, 4, '0', STR_PAD_LEFT);

        return $new_code;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if(!empty($request->proof_payment)) {
            $path = 'uploads/proof_payments/';
            $file_name = Helper::uploadImage($request->proof_payment, $path, 'only_normal_size');
        }

        return $file_name;
    }
}
