<?php

namespace App\Http\Responses\Cpanel\Medizine\Category;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\PostSubCategory;
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
                ->route('cpanel.medizine.category.list')
                ->with('success', 'Data has been successfully saved.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Article Category', 'Create', 'Created Article Category name='.$request->name);

        return PostSubCategory::create([
            'post_category_id' => $request->type,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $this->upload_image($request),
            'caption' => $request->caption,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
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