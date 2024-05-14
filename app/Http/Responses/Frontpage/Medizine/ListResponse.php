<?php

namespace App\Http\Responses\Frontpage\Medizine;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = [
                'medizine' => [
                    'types' => $this->articleType(),
                    'highlight' => $this->highligthArticle(),
                    'hits' => $this->hitsArticle(),
                    'latest' => $this->latestArticle(),
                    'more' => $this->moreArticle(),
                    'subcategories' => $this->subcategories(),
                ]
            ];

            if($request->query()) {
                return view('pages.public.medizine.specified', $data);
            } else {
                return view('pages.public.medizine.index', $data);
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function highligthArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', 1)
                ->where('is_highlight', 1)
                ->take(4)
                ->get();
        return $data;
    }

    private function hitsArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', 1)
                ->orderBy('visitor', 'DESC')
                ->take(10)
                ->get();
        return $data;
    }

    private function latestArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', 1)
                ->orderBy('created_at', 'DESC')
                ->take(3)
                ->get();
        return $data;
    }

    private function moreArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', 1)
                ->inRandomOrder()
                ->paginate(8);
        return $data;
    }

    private function subcategories()
    {
        $data = PostSubCategory::with('category')->inRandomOrder()->get();
        return $data;
    }

    private function articleType()
    {
        $data = Program::withCount(['posts' => function($query) {
            $query->where('is_publish', 1);
        }])->get();
        return $data;
    }
}
