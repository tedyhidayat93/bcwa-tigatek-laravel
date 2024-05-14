<?php

namespace App\Http\Responses\Cpanel\Medizine\Type;

use App\Models\Log;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use Exception;
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
        $type = PostCategory::find($request->id);

        $check = PostSubCategory::where('post_category_id', $request->id)->count();

        if($check > 0) {
            throw new Exception('Cannot delete type. Because category in used.');
        } else {
            return $type->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now()
            ]);
            Log::logAction($request, 'Article Type', 'Delete', 'Deleting Article Type name='.$type->name);
        }

    }
}