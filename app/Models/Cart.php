<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'participant_id',
        'item_type',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function buyer()
    {
        return $this->belongsTo(Participant::class, 'created_by');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'cart_id');
    }
    
    public function product()
    {
        return $this->hasOne(CartDetailProduct::class, 'cart_id', 'id');
    }
}
