<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'banner',
        'type_id',
        'message',
        'more_subject',
        'replied_by',
        'read_by',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'read_at',
        'replied_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(MessageType::class, 'type_id', 'id');
    }
}
