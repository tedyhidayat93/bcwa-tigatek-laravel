<?php

namespace App\Http\Responses\Frontpage\Checkout\Product;

use App\Helpers\Config;
use App\Models\Payment;
use App\Models\ProductItem;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceResponse implements Responsable
{
    public function toResponse($request)
    {
        // dd(1);
        try {
            return $this->print_invoice($request);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function print_invoice($request)
    {
        $main_app_logo = "";
        $main_logo = Config::getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_LOGO');
        if (!empty($main_logo)) {
            $main_app_logo = public_path() . '/assets/settings/normal/'.$main_logo;
        } else {
            $main_app_logo = public_path() . '/assets/images/fictro-logo.png';
        }
        $app_name = Config::getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_NAME');
        $app_name = !empty($app_name) ? $app_name : 'DEFAULT APP';
        $app_address = Config::getConfig('GENERAL_PROFILE', 'GENERAL_PROFILE_ADDRESS');
        $app_address = !empty($app_address) ? $app_address : '';

        $invoice = Payment::with('transaction')
        ->where('external_id', $request->inv)
        ->where('status','PAID')
            ->first();
        // dd($invoice->transaction->cart->product->addons);
        // dd($invoice->transaction->cart->product->productPrimary->name_id);

        $pdf = Pdf::setOption([
            'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true
        ])
        ->loadView('invoices.invoice-product', [
            'main_logo' => $main_app_logo,
            'partner_logo' => '',
            'signature' => [
                'label_1' => 'Forum Dekan AIPKI - FK USK',
                'label_2' => 'Ketua Panitia,',
                'ttd_image' => public_path() . '/assets/images/ttd-invoice.png',
                'signed_name' => 'Dr. Rovy Pratama, MBA',
                'number' => 'NIP. 199212192019031011'
            ],
            'invoice' => $invoice
        ]);

        return $pdf->download('invoice.pdf');
    }
}
