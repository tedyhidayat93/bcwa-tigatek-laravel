<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostSubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'post_category_id',
        'code',
        'name',
        'slug',
        'icon',
        'banner',
        'caption',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_sub_category_id', 'id');
    }
}
