<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'cart_id',
        'voucher_id',
        'participant_id',
        'payer_name',
        'payer_phone',
        'payer_email',
        'payer_address',
        'discount',
        'tax',
        'admin',
        'sub_total',
        'grand_total',
        'currency',
        'status',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
        'paid_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'transaction_id');
    }
}
