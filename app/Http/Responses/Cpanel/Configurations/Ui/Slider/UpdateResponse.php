<?php

namespace App\Http\Responses\Cpanel\Configurations\Ui\Slider;

use App\Helpers\Helper;
use App\Models\Slider;
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
                ->with('success', 'successfully updated slider.');
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
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];

        if($request->banner) {
            $payload['banner'] = $this->upload_image($request);
        }

        $ui = Slider::find($request->id);

        Log::logAction($request, 'UI Frontend Slider', 'Update', 'Updating Slider "'.$ui->title.'"');

        return $ui->update($payload);
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