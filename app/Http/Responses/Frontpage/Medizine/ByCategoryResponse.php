<?php

namespace App\Http\Responses\Frontpage\Medizine;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ByCategoryResponse implements Responsable
{
    public $slug_category;

    public function __construct($slug_category) {
        $this->slug_category = $slug_category;
    }

    public function toResponse($request)
    {
        try {
            $data = [
                'medizine' => [
                    'type' => $this->articleType(),
                    'subcategory' => $this->subcategory($request),
                    'latest' => $this->latestArticle($request),
                    'more' => $this->moreArticle($request),
                    'subcategories' => $this->subcategories(),
                ]
            ];
            return view('pages.public.medizine.category', $data);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function latestArticle($request)
    {
        $data = Post::with(['creator', 'type'])
                ->whereHas('type', function($query) {
                    $query->whereHas('program', function($query) {
                        $query->where('slug', $this->slug_category);
                    });
                })
                ->when($request->sc, function($query) use ($request) {
                    $query->whereHas('subcategory', function($query) use ($request) {
                        $query->where('slug', $request->sc);
                    });
                })
                ->where('is_publish', 1)
                ->orderBy('created_at', 'DESC')
                ->take(6)
                ->get();
        return $data;
    }

    private function subcategories()
    {
        $data = PostSubCategory::with('category')->inRandomOrder()->get();
        return $data;
    }

    private function moreArticle($request)
    {
        $data = Post::with(['creator', 'type'])
                ->whereHas('type', function($query) {
                    $query->whereHas('program', function($query) {
                        $query->where('slug', $this->slug_category);
                    });
                })
                ->when($request->sc, function($query) use ($request) {
                    $query->whereHas('subcategory', function($query) use ($request) {
                        $query->where('slug', $request->sc);
                    });
                })
                ->where('is_publish', 1)
                ->inRandomOrder()
                ->paginate(8);
        return $data;
    }

    private function subcategory($request)
    {
        $data = PostSubCategory::where('slug', $request->sc)->first();
        return $data ?? [];
    }

    private function articleType()
    {
        $data = Program::withCount('posts')
                ->where('slug', $this->slug_category)
                ->first();
        return $data;
    }
}
