<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentPaidNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $transaction;
    protected $invoice_link;

    /**
     * Create a new job instance.
     */
    public function __construct($transaction, $invoice_link)
    {
        $this->transaction = $transaction;
        $this->invoice_link = $invoice_link;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send('email.notif-payment-paid-product', [
            'transaction' => $this->transaction,
            'invoice_link' => $this->invoice_link,
        ], function ($message) {
            $message->to($this->transaction->payer_email)->subject('Status Lunas Pembelian Program Fictro Academy');
        });
    }
}
