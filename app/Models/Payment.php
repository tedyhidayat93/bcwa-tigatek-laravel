<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'payer_name',
        'payer_email',
        'payer_phone',
        'payment_method',
        'payment_channel',
        'bank_code',
        'merchant_name',
        'checkout_link',
        'amount',
        'status',
        'note',
        'json_callback',
        'created_by',
        'updated_by',
        'deleted_by',
        'paid_at',
        'expired_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
