<?php

namespace App\Http\Responses\Frontpage\Program;
use App\Models\PostCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class CheckoutResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.public.program.checkout');
            // return view('pages.public.homepage.index', [
            //     'types' => $this->data($request),
            //     'programs' => $this->program(),
            // ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
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
            switch($request->sort_by) {
                case 'newest':
                    $data = $data->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $data = $data->orderBy('created_at', 'asc');
                    break;
                }
        } else {
            $data = $data->orderBy('created_at', 'desc');
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }

    private function program()
    {
        return Program::get();
    }
}
