<?php

namespace App\Http\Responses\Frontpage\Checkout\Product;

use App\Models\ProductItem;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class PreviewResponse implements Responsable
{

    public $product_code;

    public function toResponse($request)
    {
        $this->product_code = $request->item;
        try {
            // dd($this->productItem());
            return view('pages.public.checkout.preview-product',[
                'product' => $this->productItem()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function productItem()
    {
        $data = ProductItem::with('productAddons')
            ->where('code', $this->product_code)
            ->where('status','active')
            ->first();
        return $data;
    }

}
