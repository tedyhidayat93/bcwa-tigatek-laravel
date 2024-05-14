<?php

namespace App\Http\Responses\Cpanel\Mentor;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Mentor;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
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
                ->route('cpanel.mentor.list')
                ->with('success', 'Data berhasil diperbarui..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $social_media = json_encode([
            'linkedin' => $request->linkedin ?? '#',
            'instagram' => $request->instagram ?? '#',
            'facebook' => $request->facebook ?? '#',
            'twitter' => $request->twitter ?? '#',
            'tiktok' => $request->tiktok ?? '#',
            'youtube' => $request->youtube ?? '#',
            'phone' => $request->phone ?? '#',
            'whatsapp' => $request->whatsapp ?? '#'
        ]);

        $payload = [
            'name' => $request->name,
            'short_bio' => $request->short_bio,
            'social_media' => $social_media,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        if($request->avatar) {
            $payload['avatar'] = $this->upload_image($request);
        }

        $Mentor = Mentor::find($request->id);
        $Mentor->update($payload);

        Log::logAction($request, 'Mentor', 'Update', 'Updating Mentor name='.$request->name);

        return $Mentor;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->avatar) {
            $path = 'uploads/mentors/';
            $file_name = Helper::uploadImage($request->avatar, $path, 'complete_size');
        }

        return $file_name;
    }
}