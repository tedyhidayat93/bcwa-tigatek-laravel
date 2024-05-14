<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetailEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'item_id',
        'participant_id',
        'json_other_information',
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

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function addons()
    {
        return $this->hasMany(CartDetailEventAddon::class, 'cart_detail_id', 'id');
    }
}
