<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'last_update_at',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
