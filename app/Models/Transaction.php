<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'date',
        'inv_number',
        'package_id',
        'item_name',
        'unit_price',
        'qty',
        'amount',
        'payment_method',
        'payment_evidence',
        'buyer_agree_terms',
        'status',
        'paid_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
