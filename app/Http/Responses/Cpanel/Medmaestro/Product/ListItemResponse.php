<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Log;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\ProductItem;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Contracts\Support\Responsable;

class ListItemResponse implements Responsable
{
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medmaestro.product.item',[
                'main_items' => $this->main_items($request),
                'secondary_items' => $this->secondary_items($request),
                'product' => $this->product(),
                'addons' => $this->addons(),
                'types' => $this->types($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function main_items($request)
    {
        // Log::logAction($request, 'Program', 'Read', 'Accessing Program List');

        $data = ProductItem::with(['product'])->select('*');
        // $data = ProductItem::select('*');

        $data = $data->where('product_id', $this->id);

        $data = $data->when(!empty($request->keyword), function($query) use ($request) {
            $query->where('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_id', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_en', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('description_id', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('description_en', 'LIKE','%'.$request->keyword.'%');
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
    
    protected function secondary_items($request)
    {
        // Log::logAction($request, 'Program', 'Read', 'Accessing Program List');
    
        $data = ProductAddon::with(['product'])->select('*');
        // $data = ProductAddon::select('*');
    
        $data = $data->where('product_id', $this->id);
    
        $data = $data->when(!empty($request->keyword), function($query) use ($request) {
            $query->where('code', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_id', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_en', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('description_id', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('description_en', 'LIKE','%'.$request->keyword.'%');
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

    private function product()
    {
        return Product::where('id', $this->id)->first();
    }

    private function addons()
    {
        return ProductAddon::where('product_id', $this->id)
            ->where('status', 'active')
            ->orderBy('number', 'asc')
            ->get();
    }

    private function types()
    {
        return Program::get();
    }
}