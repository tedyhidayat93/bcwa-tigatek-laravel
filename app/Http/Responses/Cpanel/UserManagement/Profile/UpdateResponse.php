<?php

namespace App\Http\Responses\Cpanel\UserManagement\Profile;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UpdateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->back()
                ->with('success','Successfully update your profile.');;
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }


    public function data($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
        ]);

        $social_media = json_encode([
            'linkedin' => $request->linkedin ?? '#',
            'instagram' => $request->instagram ?? '#',
            'facebook' => $request->facebook ?? '#',
            'twitter' => $request->twitter ?? '#',
            'tiktok' => $request->tiktok ?? '#',
            'youtube' => $request->youtube ?? '#',
            'phone' => 'tel:'.$request->phone ?? '#',
            'whatsapp' => $request->whatsapp ?? '#'
        ]);

        $data = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'short_bio' => $request->short_bio,
            'about' => $request->about,
            'address' => $request->address,
            'social_media' => $social_media,
            'updated_at' => now(),
        ];

        if($request->avatar) {
            $data['avatar'] = $this->upload_avatar($request);
        }

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user = User::find(auth()->user()->id);
        $user->update($data);

        Log::logAction($request, 'Profile', 'Update', auth()->user()->name. ' successfully changed profile.');
    }

    private function upload_avatar($request)
    {
        $file_name = null;
        if($request->avatar) {
            $path = 'uploads/users/avatars/';
            $file_name = Helper::uploadImage($request->avatar, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}