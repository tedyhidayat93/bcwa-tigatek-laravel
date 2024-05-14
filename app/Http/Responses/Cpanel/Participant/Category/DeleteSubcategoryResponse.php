<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\Log;
use App\Models\ParticipantSubCategory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteSubcategoryResponse implements Responsable
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
        $category = ParticipantSubCategory::find($request->id);

        Log::logAction($request, 'Participant Sub Category', 'Delete', 'Deleting Participant Sub Category name='.$category->name);

        return $category->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}