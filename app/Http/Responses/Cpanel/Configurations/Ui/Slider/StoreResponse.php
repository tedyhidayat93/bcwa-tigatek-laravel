<?php

namespace App\Http\Responses\Cpanel\Configurations\Ui\Slider;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Slider;
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
                ->back()
                ->with('success', 'Data berhasil disimpan.');
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
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'url' => $request->url,
            'banner' => $this->upload_image($request),
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        $store = Slider::create($payload);

        Log::logAction($request, 'UI Frontend Slider', 'Create', 'Add New Slider title='.$request->title);

        return $store;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->banner) {
            $path = 'uploads/sliders/';
            $file_name = Helper::uploadImage($request->banner, $path, 'complete_size');
        }

        return $file_name;
    }
}