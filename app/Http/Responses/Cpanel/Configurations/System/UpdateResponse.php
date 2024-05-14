<?php

namespace App\Http\Responses\Cpanel\Configurations\System;

use App\Helpers\Helper;
use App\Models\ConfigVariable;
use App\Models\Log;
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
                ->back()
                ->with('success', 'successfully updated configuration.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        if ($request->form_type == 'file') {
            $value = $this->upload_image($request);
        } elseif ($request->form_type == 'file-non-image') {
            $value = $this->upload_file($request);
        } else {
            $value = $request->value;
        }

        $system = ConfigVariable::find($request->id);

        Log::logAction($request, 'Main System', 'Update', 'Updating Main sytem "'.$system->name.'" value="'.$value.'"');

        return $system->update([
            'value' => $value,
            'updated_at' => now()
        ]);
    }

    private function upload_image($request)
    {
        $file_name = null;
        $path = 'assets/settings/';
        $file_name = Helper::uploadImage($request->value, $path, 'only_normal_size');
        return $file_name;
    }

    private function upload_file($request)
    {
        $path = 'assets/settings/attachment/';
        $file_name = Helper::uploadFile($request->value, $path);
        return $file_name;
    }
}