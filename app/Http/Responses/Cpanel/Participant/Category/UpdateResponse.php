<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\Log;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
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
                ->route('cpanel.participant.category.list')
                ->with('success', 'Successfully Updated Data.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $request->validate([
            // 'id' => 'exists:participant_categories,id',
            'name' => 'required|string|max:255',
            'subcategory.*' => 'required|string|max:255',
        ]);
    
        Log::logAction($request, 'Participant Category', 'Update', 'Updating Participant Category name='.$request->name);

        $category = ParticipantCategory::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ]);

        if($request->subcategory) {
            foreach ($request->subcategory as $index => $sub_category_name) {
                $subcategoryID = $request->subcategoryid[$index] ?? null;
                if($subcategoryID) {
                    $subcategory = ParticipantSubCategory::where('id', $subcategoryID)
                        ->where('participant_category_id', $request->id)
                        ->first();
    
                    if($subcategory) {
                        $subcategory->update([
                            'name' => $sub_category_name,
                            'slug' => Str::slug($sub_category_name),
                            'updated_by' => auth()->user()->id,
                            'updated_at' => now()
                        ]);
                    }
                } else {
                    ParticipantSubCategory::create([
                        'participant_category_id' => $request->id,
                        'name' => $sub_category_name,
                        'slug' => Str::slug($sub_category_name),
                        'created_by' => auth()->user()->id,
                        'created_at' => now()
                    ]);
                }
            }
        }
    }

}