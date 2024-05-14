<?php

namespace App\Http\Responses\Frontpage\Checkout\Product;
use Illuminate\Contracts\Support\Responsable;

class CheckoutResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.public.checkout.preview-product');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
