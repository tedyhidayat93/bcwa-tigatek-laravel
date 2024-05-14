<?php

namespace App\Http\Responses\Cpanel\Participant;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Participant;
use App\Models\Post;
use App\Models\PostAuthor;
use Carbon\Carbon;
use Exception;
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
                ->route('cpanel.participant.list')
                ->with('success', 'Data berhasil diperbarui..');
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
        ]);

        $data = Participant::find($request->id);

        $social_media = json_encode([
            'linkedin' => $request->linkedin ?? '#',
            'instagram' => $request->instagram ?? '#',
            'facebook' => $request->facebook ?? '#',
            'twitter' => $request->twitter ?? '#',
            'tiktok' => $request->tiktok ?? '#',
            'youtube' => $request->youtube ?? '#',
        ]);

        $payload = [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'fullname' => $request->fullname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'participant_type_id' => $request->type,
            'participant_category_id' => $request->category,
            'participant_sub_category_id' => $request->sub_category,
            'short_bio' => $request->short_bio,
            'address' => $request->address,
            'social_media' => $social_media,
            'created_at' => now(),
        ];
        
        if($request->password) {
            $payload['password'] = Hash::make($request->password);
        }
        if($request->avatar) {
            $payload['avatar'] = $this->upload_avatar($request);
        }

        $data->update($payload);

        Log::logAction($request, 'Participant', 'Update', 'Updating Participant where name='.$data->name);

        return $data;
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