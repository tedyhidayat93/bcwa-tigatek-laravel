<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetailProductAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_detail_id',
        'item_addon_id',
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

    public function productAddon()
    {
        return $this->belongsTo(ProductAddon::class, 'item_addon_id');
    }

    public function cartDetailProduct()
    {
        return $this->belongsTo(CartDetailProduct::class, 'cart_detail_id');
    }
}
