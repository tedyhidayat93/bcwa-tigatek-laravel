<?php

namespace App\Http\Responses\Frontpage\Medizine;
use App\Models\Post;
use App\Models\PostVisitor;
use Illuminate\Contracts\Support\Responsable;

class ReadResponse implements Responsable
{
    public $slug_category;
    public $slug_article;

    public function __construct($slug_category, $slug_article) {
        $this->slug_category = $slug_category;
        $this->slug_article = $slug_article;
    }

    public function toResponse($request)
    {
        try {
            $data = [
                'data' => $this->data($request),
                'relates' => $this->relates(),
            ];
            return view('pages.public.medizine.read', $data);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = Post::with(['type','creator','authors', 'subcategory', 'reviewer'])
            ->where('slug',$this->slug_article)
            ->first();

        if ($data) {
            $count = PostVisitor::counterVisitor($request, $data);
            if($count == true) {
                $data->increment('visitor');
            }
        }

        return $data;
    }

    private function relates()
    {
        $data = Post::with(['type'])
                ->whereHas('type', function($query) {
                    $query->where('slug', $this->slug_category);
                })
                ->whereNot('slug', $this->slug_article)
                ->where('is_publish', 1)
                ->inRandomOrder()
                ->take(4)
                ->get();
        return $data;
    }
}
