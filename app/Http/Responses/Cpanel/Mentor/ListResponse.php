<?php

namespace App\Http\Responses\Cpanel\Mentor;

use App\Models\Log;
use App\Models\Mentor;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.mentor.list', [
                'mentors' => $this->data($request)
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Mentor', 'Read', 'Accessing Mentor List');

        $data = Mentor::select('*');

        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('short_bio', 'LIKE','%'.$request->keyword.'%');
        });

        switch(true) {
            case ($request->sort_by == 'newest'):
                $data = $data->orderBy('id', 'desc');
                break;
            case ($request->sort_by == 'oldest'):
                $data = $data->orderBy('id', 'asc');
                break;
            default:
                $data = $data->orderBy('id', 'desc');
                break;
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }
}