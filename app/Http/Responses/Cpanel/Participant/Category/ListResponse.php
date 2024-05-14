<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\Log;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        // dd($this->data($request));
        try {
            return view('pages.cpanel.participant.category.list', [
                'categories' => $this->data($request),
                // 'types' => $this->type(),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Participant Category', 'Read', 'Accessing Participant Category');

        $data = ParticipantCategory::with(['sub_categories'])->select('*');

        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('name', 'LIKE','%'.$request->keyword.'%');
            $query->orWhereHas('sub_categories', function($subquery) use($request) {
                $subquery->where('name', $request->keyword);
            });
        });

        if($request->sort_by){
            switch(TRUE) {
                case ($request->sort_by == 'newest'):
                    $data = $data->orderBy('id', 'desc');
                    break;
                case ($request->sort_by == 'oldest'):
                    $data = $data->orderBy('id', 'asc');
                    break;
                }
        } else {
            $data = $data->orderBy('id', 'asc');
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }
}