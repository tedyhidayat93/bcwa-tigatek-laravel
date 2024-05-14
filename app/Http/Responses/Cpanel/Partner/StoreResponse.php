<?php

namespace App\Http\Responses\Cpanel\Partner;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Partner;
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
                ->route('cpanel.partner.list')
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
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $this->upload_image($request),
            'code' => $request->code,
            'url_link' => $request->url_link,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        $store = Partner::create($payload);

        Log::logAction($request, 'Partner', 'Create', 'Created Partner name='.$request->name);

        return $store;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->logo) {
            $path = 'uploads/partners/';
            $file_name = Helper::uploadImage($request->logo, $path, 'complete_size');
        }

        return $file_name;
    }
}