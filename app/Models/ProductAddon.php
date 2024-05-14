<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAddon extends Model
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
        'price_type',
        'price_usd',
        'price_idr',
        'price_percentage_usd',
        'price_percentage_idr',
        'unit_idr',
        'unit_usd',
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

    // public function productItems()
    // {
    //     return $this->belongsToMany(ProductItem::class);
    // }

}
