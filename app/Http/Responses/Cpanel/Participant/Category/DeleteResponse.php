<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\Log;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
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
        $category = ParticipantCategory::find($request->id);

        $check = ParticipantSubCategory::where('participant_category_id', $request->id)->count();
        
        if($check > 0) {
            throw new Exception('Cannot delete category. Because sub category in used.');
        } else {
            return $category->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now()
            ]);
            Log::logAction($request, 'Participant Category', 'Delete', 'Deleting Participant Category name='.$category->name);
        }
    }
}