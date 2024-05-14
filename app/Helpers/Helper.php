<?php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class Helper
{

    public static function convertSecondToStringTime($second_time = null) {
        $hours = floor($second_time / 3600);
        $minutes = floor(($second_time % 3600) / 60);
        $seconds = $second_time % 60;

        $timeString = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        return $timeString;
    }

    public static function weekEndDateOffline($value)
    {
        // $array = (array)json_decode(file_get_contents('https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json'));
        // if (isset($array[$value])) {
        //     echo "tanggal merah " . $array[$value]["deskripsi"];
        // } else if (date("D", strtotime($value)) === "Sun") {
        //     echo "tanggal merah hari minggu";
        // } else {
        //     echo "bukan tanggal merah";
        // }

        if (date("D", strtotime($value)) === "Sun") {
            $is_sunday = true;
        } else {
            $is_sunday = false;
        }

        return $is_sunday;
    }

    public static function weekEndDateOnline($value)
    {
        $array = (array)json_decode(file_get_contents('https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json'));

        // dd($array);
        $day_identity = [];

        // if (isset($array[$value])) {
        if (isset($array[$value]) == $value) {
            $day_identity = [
                'libur' => true,
                'ket' => $array[$value]->deskripsi
            ];
        } else if (date("D", strtotime($value)) === "Sun") {
            $day_identity = [
                'libur' => true,
                'ket' => null
            ];
        } else {
            $day_identity = [
                'libur' => false,
                'ket' => null
            ];
        }

        return $day_identity;
    }

    public static function formatDateIndo($date, $type = null)
    {

        if($type == 'type1') $type = 'dddd, D MMMM Y';
        if($type == 'type2') $type = 'D MMMM Y';
        if($type == null) $type = 'D M Y';
        return Carbon::parse( $date )->isoFormat($type);
    }

    public static function uploadImage($file, $destinationFolder, $resize = null)
    {
        /**
         * Resize type :
         * 1. complete_size = normal,medium,thumb
         * 2. only_normal_size = hanya ukuran normal
         * 3. with_thumb_size = dengan ukuran thumb
         * 4. with_medium_size = dengan ukuran medium
         */
        $img = Image::make($file->getRealPath());
        $name = date('dmY').'-'.time().'.'. $file->getClientOriginalExtension();
        $normal_path = $destinationFolder.'normal';
        $medium_path = $destinationFolder.'medium';
        $thumb_path = $destinationFolder.'thumb';

        if($resize == null ||
        $resize == '' ||
        $resize == 'complete_size' ||
        $resize == 'only_normal_size' ||
        $resize == 'with_medium_size' ||
        $resize == 'with_thumb_size') {
            if (!File::exists($normal_path)) File::makeDirectory($normal_path, 0777,true,true,true);
            $file->move($normal_path,$name);
        }

        if($resize == 'with_medium_size' || $resize == 'complete_size') {
            if (!File::exists($medium_path)) File::makeDirectory($medium_path, 0777,true,true,true);
            $img->resize(650, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($medium_path.'/'.$name);
        }

        if($resize == 'with_thumb_size' || $resize == 'complete_size') {
            if (!File::exists($thumb_path)) File::makeDirectory($thumb_path, 0777,true,true,true);
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumb_path.'/'.$name);
        }

        return $name;
    }

    public static function uploadFile($file, $destinationFolder)
    {
        $name = date('dmY').'-'.time().'.'. $file->getClientOriginalExtension();

        if (!File::exists($destinationFolder)) File::makeDirectory($destinationFolder, 0777,true,true,true);
        $file->move($destinationFolder, $name);

        return $name;
    }

    public static function deleteFileStorage($filename, $destinationFolder)
    {
        Storage::disk($destinationFolder)->delete($filename);
        return true;
    }

    public static function noxssString($string)
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $string);
    }

    public static function sanitizeTolower($string)
    {
        return strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $string));
    }

    public static function sanitizeToUpper($string)
    {
        return strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $string));
    }
}