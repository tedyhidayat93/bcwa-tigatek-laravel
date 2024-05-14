<?php

namespace App\Http\Responses\Cpanel\UserManagement\Permission;

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
        return PostSubCategory::create([
            'post_category_id' => $request->type,
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'caption' => $request->caption,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
    }
}