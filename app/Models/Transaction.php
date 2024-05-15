<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'buyer_agree_terms',
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
        'status',
        'payment_proof',
        'payment_proof_date',
        'rejected_at',
        'paid_at',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
