<?php

namespace App\Http\Responses\Cpanel\Information;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Information;
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
                ->route('cpanel.information.list')
                ->with('success', 'The data has been successfully updated..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $payload = [
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'is_active' => $request->is_active ? config('constants.active_status') : config('constants.inactive_status'),
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        if($request->banner) {
            $payload['banner'] = $this->upload_image($request);
        }

        if($request->is_active == config('constants.active_status')) {
            Information::where('is_active', config('constants.active_status'))
                ->update([
                    'is_active' => config('constants.inactive_status')
                ]);
        }

        $Information = Information::find($request->id);

        $Information->update($payload);

        Log::logAction($request, 'Information', 'Update', 'Updating Information title='.$request->name);

        return $Information;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->banner) {
            $path = 'uploads/informations/';
            $file_name = Helper::uploadImage($request->banner, $path, 'complete_size');
        }

        return $file_name;
    }
}