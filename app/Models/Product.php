<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'doc_number',
        'type_id',
        'name_id',
        'name_en',
        'slug_id',
        'slug_en',
        'caption_id',
        'caption_en',
        'description_id',
        'description_en',
        'icon',
        'banner',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function type() // ini tidak dipakai
    {
        return $this->belongsTo(ProgramCategory::class, 'type_id');
    }

    public function program() // ini yang dipakai relasi
    {
        return $this->belongsTo(Program::class, 'type_id');
    }

    public function productItems()
    {
        return $this->hasMany(ProductItem::class, 'product_id');
    }

    public function productAddons()
    {
        return $this->hasMany(ProductAddon::class, 'product_id');
    }


    // $productItem = ProductItem::find($id);
    // $addons = $productItem->addons; // Mendapatkan semua addon terkait

    // $addon = Addon::find($addonId);
    // $productItem->addons()->attach($addon); // Menambahkan addon ke produk item
    // $productItem->addons()->detach($addon); // Menghapus addon dari produk item


}
