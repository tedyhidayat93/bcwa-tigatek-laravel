<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'code',
        'number',
        'name_id',
        'name_en',
        'slug_id',
        'slug_en',
        'caption_id',
        'caption_en',
        'description_id',
        'description_en',
        'admin_fee',
        'price_usd',
        'price_idr',
        'unit_idr',
        'unit_usd',
        'discount_usd',
        'discount_idr',
        'icon',
        'banner',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productAddons()
    {
        return $this->belongsToMany(ProductAddon::class, 'product_item_product_addon', 'product_item_id', 'product_addon_id')
            ->withTimestamps()
            ->withPivot('created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at');
    }

}
