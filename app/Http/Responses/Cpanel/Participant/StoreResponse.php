<?php

namespace App\Http\Responses\Cpanel\Participant;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Participant;
use App\Models\Post;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.participant.list')
                ->with('success', 'Data has been successfully saved.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'lastname' => 'max:50',
            'fullname' => 'max:255',
            'email' => 'required|email|min:5|max:30|unique:participants,email',
            'whatsapp' => 'required|min:12|max:17|unique:participants,whatsapp',
        ]);

        $social_media = json_encode([
            'linkedin' => $request->linkedin ?? '#',
            'instagram' => $request->instagram ?? '#',
            'facebook' => $request->facebook ?? '#',
            'twitter' => $request->twitter ?? '#',
            'tiktok' => $request->tiktok ?? '#',
            'youtube' => $request->youtube ?? '#',
        ]);

        Participant::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'username' => explode('@', $request->email)[0].date('YmdHi'),
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'participant_type_id' => $request->type,
            'participant_category_id' => $request->category,
            'participant_sub_category_id' => $request->sub_category,
            'avatar' => $this->upload_avatar($request),
            'short_bio' => $request->short_bio,
            'address' => $request->address,
            'social_media' => $social_media,
            'password' => Hash::make($request->password ?? 'fictro123'),
            'created_at' => now(),
        ]);

        Log::logAction($request, 'Participant', 'Create', 'Created Participant name= '.$request->fullname);
    }

    private function upload_avatar($request)
    {
        $file_name = null;
        if($request->avatar) {
            $path = 'uploads/participants/';
            $file_name = Helper::uploadImage($request->avatar, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}