<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
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
                ->route('cpanel.participant.category.list')
                ->with('success', 'Data has been successfully saved.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:participant_categories,name',
        ]);

        Log::logAction($request, 'Participant Category', 'Create', 'Created Participant Category name='.$request->name);

        $category = ParticipantCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
        
        if($request->subcategory) {
            $participant_subcategory = [];
            foreach($request->subcategory as $subcategory) {
                $participant_subcategory[] = [
                    'participant_category_id' => $category->id,
                    'name' => $subcategory,
                    'slug' => Str::slug($subcategory),
                    'created_by' => auth()->user()->id,
                    'created_at' => now()
                ];
            }
            ParticipantSubCategory::insert($participant_subcategory);
        }
    }
}