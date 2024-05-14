<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Log;
use App\Models\Product;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medmaestro.product.list',[
                'products' => $this->data($request),
                'types' => $this->types($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = Product::with(['productItems','productAddons'])->select('*');

        $data = $data->when(!empty($request->keyword), function($query) use ($request) {
            $query->orWhere('doc_number', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_en', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('name_id', 'LIKE','%'.$request->keyword.'%');
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

    private function types()
    {
        return Program::get();
    }
}