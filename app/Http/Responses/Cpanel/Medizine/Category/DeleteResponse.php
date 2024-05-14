<?php

namespace App\Http\Responses\Cpanel\Medizine\Category;

use App\Models\Log;
use App\Models\PostSubCategory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return back()->with('success', 'Data successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $category = PostSubCategory::find($request->id);

        Log::logAction($request, 'Article Category', 'Delete', 'Deleting Article Category name='.$category->name);

        return $category->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}