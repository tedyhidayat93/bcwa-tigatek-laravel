<?php

namespace App\Http\Responses\Cpanel\UserManagement\Permission;

use App\Models\PostCategory;
use App\Models\PostSubCategory;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        // dd($this->data($request));
        try {
            return view('pages.cpanel.medizine.category.list', [
                'categories' => $this->data($request),
                'types' => $this->type(),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = PostSubCategory::with(['category'])->select('*');

        $data = $data->when($request->type && $request->type != 'all', function($query) use ($request) {
            $query->whereHas('category', function($subquery) use($request) {
                $subquery->where('id', $request->type);
            });
        });
        
        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name', 'LIKE','%'.$request->keyword.'%');
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

    private function type()
    {
        return PostCategory::get();
    }
}