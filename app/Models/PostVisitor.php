<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostVisitor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'post_id',
        'program_id',
        'category_id',
        'sub_category_id',
        'action',
        'device',
        'ip_address',
        'country',
        'region',
        'city',
        'address',
        'lat',
        'lon',
        'user_agent',
        'updated_by',
        'deleted_by',
    ];

    public static function counterVisitor($request, $post)
    {
        $ip = $request;
        $geoip = geoip()->getLocation($ip = null);
        
        $today = now()->toDateString();
        $existingVisitor = self::where('post_id', $post->id)
            ->where('ip_address', $geoip->ip)
            ->whereDate('created_at', '=', $today)
            ->first();

        if(!$existingVisitor) {
            $userAgent = $request->userAgent();
            switch (true) {
                case (strpos($userAgent, 'Mobile') !== false || strpos($userAgent, 'Android') !== false || strpos($userAgent, 'iOS') !== false) :
                    $device = 'Mobile';
                    break;
                case (strpos($userAgent, 'Tablet') !== false) :
                    $device = 'Tablet';
                    break;
                default:
                    $device = 'Desktop';
                    break;
            }
            
            $log = new self(); 
            $log->post_id = $post->id;
            $log->program_id = $post->type->program->id;
            $log->category_id = $post->post_category_id;
            $log->sub_category_id = $post->post_sub_category_id;
            $log->action = null;
            $log->device = $device;
            $log->ip_address = $geoip->ip;
            $log->country = $geoip->country;
            $log->city = $geoip->city;
            $log->lat = $geoip->lat;
            $log->lon = $geoip->lon;
            $log->year = date('Y');
            $log->user_agent = $request->userAgent();
            $log->save();

            return true;
        } else {
            return false;
        }

    }
}
