<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetailEventAddon extends Model
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

    public function cartDetailProduct()
    {
        return $this->belongsTo(CartDetailEvent::class, 'cart_detail_id');
    }
}
