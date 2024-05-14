<?php

namespace App\Http\Responses\Cpanel\Program\Type;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\ProgramCategory;
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
                ->route('cpanel.program.type.list')
                ->with('success', 'Successfully Updated Data.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Program Type', 'Update', 'Updating Program Type name='.$request->name);

        $payload = [
            'program_id' => $request->program,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'caption' => $request->caption,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];

        if($request->icon) {
            $payload['icon'] = $this->upload_icon($request);
        }

        if($request->banner) {
            $payload['banner'] = $this->upload_banner($request);
        }

        return ProgramCategory::where('id', $request->id)->update($payload);
    }

    private function upload_icon($request)
    {
        $file_name = null;
        if($request->icon) {
            $path = 'uploads/programs/types/icons/';
            $file_name = Helper::uploadImage($request->icon, $path, 'with_thumb_size');
        }

        return $file_name;
    }
    private function upload_banner($request)
    {
        $file_name = null;
        if($request->banner) {
            $path = 'uploads/programs/types/banners/';
            $file_name = Helper::uploadImage($request->banner, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}