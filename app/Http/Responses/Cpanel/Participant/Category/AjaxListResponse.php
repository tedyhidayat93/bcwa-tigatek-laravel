<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use Illuminate\Contracts\Support\Responsable;

class AjaxListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Succesfully fetch data.',
                'data' => $this->data($request)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    protected function data($request)
    {
        $data = ParticipantSubCategory::select('*');

        $data = $data->when($request->category, function($query) use ($request) {
            $query->whereHas('category', function($subquery) use($request) {
                $subquery->where('id', $request->category);
            });
        });

        $data = $data->orderBy('name', 'asc');

        $data = $data->get();

        return $data;
    }
}