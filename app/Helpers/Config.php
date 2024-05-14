<?php

namespace App\Helpers;

use App\Models\ConfigVariable;
use Illuminate\Support\Facades\Cache;

class Config
{
    public static function getConfig($group, $code)
    {
        return ConfigVariable::where('group', $group)
                ->where('code', $code)
                // ->where('is_active', 1)
                ->value('value');
        // return Cache::rememberForever("config:$group:$code", function () use ($group, $code) {
        // });
    }
}
