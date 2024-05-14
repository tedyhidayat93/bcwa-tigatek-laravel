<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'fullname',
        'username',
        'email',
        'whatsapp',
        'gender',
        'avatar',
        'short_bio',
        'address',
        'social_media',
        'password',
        'birthdate',
        'email_verified_at',
        'status',
        'participant_type_id',
        'participant_category_id',
        'participant_sub_category_id',
        'suspend_to',
        'last_activity',
        'last_login',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function type()
    {
        return $this->belongsTo(ParticipantType::class, 'participant_type_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ParticipantCategory::class, 'participant_category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(ParticipantSubCategory::class, 'participant_sub_category_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
