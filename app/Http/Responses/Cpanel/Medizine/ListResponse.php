<?php

namespace App\Http\Responses\Cpanel\Medizine;

use App\Models\Log;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medizine.post.list', [
                'posts' => $this->data($request),
                'total_posts' => $this->post_totals($request),
                'programs' => $this->program(),
                'types' => $this->type(),
                'categories' => $this->categories($request),
                'creators' => $this->creators(),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Article', 'Read', 'Accessing Article List');

        $data = $this->query_filter($request);

        if($request->sort_by){
            $data = $data->orderBy('is_highlight', 'desc');
            switch(TRUE) {
                case ($request->sort_by == 'newest'):
                    $data = $data->orderBy('id', 'desc');
                    break;
                case ($request->sort_by == 'oldest'):
                    $data = $data->orderBy('id', 'asc');
                    break;
                case 'hits':
                    $data = $data->orderBy('visitor', 'desc'); 
                    break;
            }
        } else {
            $data = $data->orderBy('is_highlight', 'desc');
            $data = $data->orderBy('id', 'asc');
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }

    private function post_totals($request)
    {
        return [
            'all' => $this->count_post($request, 'all'),
            'pending' => $this->count_post($request, 0),
            'published' => $this->count_post($request, 1),
        ];
    }

    private function count_post($request, $status_count = null)
    {
        $data = $this->query_filter_count($request, $status_count);

        $data = $data->count();

        return $data;
    }

    private function query_filter($request)
    {
        $data = Post::with(['type','authors'])->select('*');
        $data = $data->when($request->date, function($query) use ($request) {
            $date_range = explode(" - ", $request->date);
            $start_date = Carbon::createFromFormat('d/m/y', $date_range[0])->startOfDay();
            $end_date = Carbon::createFromFormat('d/m/y', $date_range[1])->endOfDay();
            $query->whereBetween('created_at', [$start_date, $end_date]);
        });

        $data = $data->when($request->type && $request->type != 'all', function($query) use ($request) {
            $query->whereHas('type', function($subquery) use($request) {
                $subquery->where('code', $request->type);
            });
        });

        $data = $data->when($request->category && $request->category != 'all', function($query) use ($request) {
            $query->where('post_sub_category_id', $request->category);
        });

        if (auth()->user()->hasRole('super-admin')) {
            $data = $data->when(!empty($request->creator) && $request->creator != 'all', function($query) use ($request) {
                $query->where('created_by', $request->creator);
                $query->orWhereHas('authors', function ($query) use ($request) {
                    $query->where('user_id', $request->creator);
                });
            });
        } else {
            $data = $data->where('created_by', auth()->user()->id);
            $data = $data->whereHas('authors', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }

        $data = $data->when(!empty($request->keyword), function($query) use ($request) {
            $query->orWhere('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('title', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('caption', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('content_medizine', 'LIKE','%'.$request->keyword.'%');
        });

        $data = $data->whereHas('type', function ($subquery) {
            $subquery->whereNull('deleted_at');
        });

        if(!empty($request->status)) {
            switch(true) {
                case ($request->status == 'pending'):
                    $data = $data->where('is_publish', 0);
                    break;
                case ($request->status == 'publish'):
                    $data = $data->where('is_publish', 1);
                    break;
            }
        }

        return $data;
    }

    private function query_filter_count($request, $status_count)
    {
        $data = Post::with(['type','authors'])->select('*');
        $data = $data->when($request->date, function($query) use ($request) {
            $date_range = explode(" - ", $request->date);
            $start_date = Carbon::createFromFormat('d/m/y', $date_range[0])->startOfDay();
            $end_date = Carbon::createFromFormat('d/m/y', $date_range[1])->endOfDay();
            $query->whereBetween('created_at', [$start_date, $end_date]);
        });

        $data = $data->when($request->type && $request->type != 'all', function($query) use ($request) {
            $query->whereHas('type', function($subquery) use($request) {
                $subquery->where('code', $request->type);
            });
        });

        $data = $data->when($request->category && $request->category != 'all', function($query) use ($request) {
            $query->where('post_sub_category_id', $request->category);
        });

        if (auth()->user()->hasRole('super-admin')) {
            $data = $data->when(!empty($request->creator) && $request->creator != 'all', function($query) use ($request) {
                $query->where('created_by', $request->creator);
                $query->orWhereHas('authors', function ($query) use ($request) {
                    $query->where('user_id', $request->creator);
                });
            });
        } else {
            $data = $data->where('created_by', auth()->user()->id);
            $data = $data->whereHas('authors', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }
        
        if($status_count != 'all') {
            $data = $data->where('is_publish', $status_count);
        }

        return $data;
    }

    private function program()
    {
        return Program::get();
    }

    private function type()
    {
        return PostCategory::get();
    }

    private function categories($request)
    {
        $data = PostSubCategory::select('id','name','post_category_id');
        $data = $data->when($request->type && $request->type != 'all', function($query) use ($request) {
            $query->whereHas('category', function($subquery) use($request) {
                $subquery->where('code', $request->type);
            });
        });
        $data = $data->get();

        return $data;
    }

    private function creators()
    {
        $data = User::select('id','name','avatar','gender');
        $data = $data->orderBy('name', 'ASC');
        $data = $data->get();

        return $data;
    }
}