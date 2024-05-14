<?php

namespace App\Http\Responses\Frontpage\Program;
use App\Models\PostCategory;
use App\Models\ProductItem;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    public $slug_program;
    public $slug_product_item;

    public function __construct($slug_program, $slug_product_item) {
        $this->slug_program = $slug_program;
        $this->slug_product_item = $slug_product_item;
    }

    public function toResponse($request)
    {
        try {
            $data = [
                'program' => $this->program(),
                'product' => $this->productItems($request),
            ];

            return view('pages.public.program.show', $data);
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

    private function productItems($request)
    {
        $data = ProductItem::with(['product','productAddons'])
            ->where('slug_id', $this->slug_product_item)
            ->where('status','active')
            ->first();
        return $data;
    }
}
