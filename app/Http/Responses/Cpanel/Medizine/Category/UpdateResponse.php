<?php

namespace App\Http\Responses\Cpanel\Medizine\Category;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
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
                ->route('cpanel.medizine.category.list')
                ->with('success', 'Successfully Updated Data.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Article Category', 'Update', 'Updating Article Category name='.$request->name);

        $payload = [
            'post_category_id' => $request->type,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'caption' => $request->caption,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];

        if($request->icon) {
            $payload['icon'] = $this->upload_image($request);
        }

        return PostSubCategory::where('id', $request->id)->update($payload);
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->icon) {
            $path = 'uploads/post_categories/';
            $file_name = Helper::uploadImage($request->icon, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}