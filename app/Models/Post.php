<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'code',
        'post_category_id',
        'post_sub_category_id',
        'caption',
        'keywords',
        'content_medizine',
        'show_cover_type',
        'cover_link',
        'cover_image',
        'banner',
        'reference',
        'cites',
        'contributors',
        'thumbnail_cover_share',
        'can_export_pdf',
        'attachment',
        'is_highlight',
        'is_publish',
        'history',
        'visitor',
        'created_by',
        'publish_by',
        'updated_by',
        'deleted_by',
        'publish_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(PostSubCategory::class, 'post_sub_category_id', 'id');
    }

    public function reviewer()
    {
       return $this->belongsTo(User::class, 'publish_by', 'id');
    }

    public function creator()
    {
       return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function authors()
    {
       return $this->hasMany(PostAuthor::class, 'post_id', 'id');
    }
}
