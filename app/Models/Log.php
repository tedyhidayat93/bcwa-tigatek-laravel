<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Matriphe\Larinfo\Larinfo;
use Torann\GeoIP\Facades\GeoIP;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'module', 'action', 'user_id', 'message', 'device', 'ip_address', 'city', 'address', 'user_agent', 'updated_by', 'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function logAction(Request $request, $module, $action, $message)
    {
        $ip = $request->ip();
        $geoip = geoip()->getLocation($ip = null);

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
        $log->module = $module;
        $log->action = $action;
        $log->user_id = auth()->id();
        $log->message = $message;
        $log->device = $device;
        $log->ip_address = $geoip->ip;
        $log->country = $geoip->country;
        // $log->region = $geoip->region;
        $log->city = $geoip->city;
        // $log->address = $geoip->address;
        $log->lat = $geoip->lat;
        $log->lon = $geoip->lon;
        $log->user_agent = $request->userAgent();
        $log->save();
    }
}
