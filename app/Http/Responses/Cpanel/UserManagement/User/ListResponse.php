<?php

namespace App\Http\Responses\Cpanel\UserManagement\User;

use App\Models\Log;
use App\Models\PostCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medizine.type.list', [
                'types' => $this->data($request),
                'programs' => $this->program(),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'user_management', 'Read', 'Access List User');

        $data = PostCategory::with(['program'])->select('*');

        $data = $data->when($request->program && $request->program != 'all', function($query) use ($request) {
            $query->whereHas('program', function($subquery) use($request) {
                $subquery->where('id', $request->program);
            });
        });
        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('caption', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('description', 'LIKE','%'.$request->keyword.'%');
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

    private function program()
    {
        return Program::get();
    }
}