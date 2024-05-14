<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory, SoftDeletes;    

    protected $fillable = [
        'program_id',
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

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function sub_category()
    {
        return $this->hasMany(PostSubCategory::class, 'post_category_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id', 'id');
    }
}
