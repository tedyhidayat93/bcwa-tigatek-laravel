<?php

namespace App\Http\Responses\Cpanel\Program\Type;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\ProgramCategory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
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
                ->route('cpanel.program.type.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Program Type', 'Create', 'Created Program Type name='.$request->name);

        return ProgramCategory::create([
            'program_id' => $request->program,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $this->upload_icon($request),
            'banner' => $this->upload_banner($request),
            'caption' => $request->caption,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
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