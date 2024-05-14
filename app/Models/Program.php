<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
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

    public function post_categories()
    {
        return $this->hasMany(PostCategory::class, 'program_id', 'id');
    }

    public function postCategories()
    {
        return $this->hasManyThrough(Post::class, PostCategory::class, 'program_id', 'post_category_id');
    }


    public function posts()
    {
        return $this->hasManyThrough(Post::class, PostCategory::class, 'program_id', 'post_category_id');
    }

}
