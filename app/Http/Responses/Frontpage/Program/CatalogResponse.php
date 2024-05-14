<?php

namespace App\Http\Responses\Frontpage\Program;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class CatalogResponse implements Responsable
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
                'products' => $this->productItems($request),
            ];

            return view('pages.public.program.catalog',$data);
        } catch (\Exception $e) {
            dd($e);
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

    private function productItems($request)
    {
        $data = ProductItem::select('*')
            ->whereHas('product', function($q) {
                $q->whereHas('program', function($q) {
                    $q->where('slug', $this->slug_program);
                });
            })
            ->where('status','active');
        if($request->sort_by){
            switch(TRUE) {
                case ($request->sort_by == 'latest'):
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
            $data = $data->orderBy('id', 'asc');
        }

        $data = $data->paginate((int)$request->per_page ?? config('constants.default_catalog_products_pagination'));

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
        $data = PostSubCategory::with(['posts','category'])
                ->where('post_category_id', $category->id ?? null)
                ->get();
        return $data;
    }
}
