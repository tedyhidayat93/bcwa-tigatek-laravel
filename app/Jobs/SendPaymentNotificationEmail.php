<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;
    protected $product;
    protected $invoice_data;

    /**
     * Create a new job instance.
     */
    public function __construct($request, $product, $invoice_data)
    {
        $this->request = $request;
        $this->product = $product;
        $this->invoice_data = $invoice_data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send('email.notif-payment-settled-product', [
            'request' => $this->request,
            'invoice_data' => $this->invoice_data,
            'product' => $this->product,

        ], function ($message) {
            $message->to($this->request['buyer_email'])->subject('Pembelian Program Fictro Academy');
        });
    }
}
