<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantSubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'participant_category_id',
        'name',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ParticipantCategory::class, 'participant_category_id', 'id');
    }
}
