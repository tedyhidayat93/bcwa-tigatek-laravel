<?php

namespace App\Http\Responses\Frontpage\Program;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class AboutResponse implements Responsable
{
    public $slug_program;

    public function __construct($slug_program) {
        $this->slug_program = $slug_program;
    }

    public function toResponse($request)
    {
        try {
            $data = [
                'data' => $this->program(),
                'article_subcategories' => $this->articleSubCategories(),
            ];
            // dd($data['article_subcategories']);
            return view('pages.public.program.about',$data);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function program()
    {
        $data = Program::select('code','slug','name','icon','caption','description')
                ->where('slug',$this->slug_program)
                ->first();
        return $data;
    }

    private function articleSubCategories()
    {

        $program = Program::select('id')
                ->where('slug',$this->slug_program)
                ->firstOrFail();
        $category = PostCategory::select('id')
                ->where('program_id',$program->id)
                ->first();
        $data = PostSubCategory::with(['posts' => function($query) {
                    $query->where('is_publish', 1);
                },'category'])
                ->where('post_category_id', $category->id ?? null)
                ->get();
        return $data;
    }
}
