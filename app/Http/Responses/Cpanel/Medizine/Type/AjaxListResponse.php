<?php

namespace App\Http\Responses\Cpanel\Medizine\Type;

use App\Models\PostCategory;
use App\Models\PostSubCategory;
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
        $data = PostCategory::with(['program'])->select('*');

        $data = $data->when($request->program, function($query) use ($request) {
            $query->whereHas('program', function($subquery) use($request) {
                $subquery->where('id', $request->program);
            });
        });

        $data = $data->orderBy('name', 'asc');

        $data = $data->get();

        return $data;
    }
}