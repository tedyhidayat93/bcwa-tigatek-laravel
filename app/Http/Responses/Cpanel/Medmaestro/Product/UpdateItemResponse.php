<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\ProductItem;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateItemResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {

                if($request->type == 'primary') {
                    return $this->main_program($request);
                } elseif($request->type == 'secondary') {
                    return $this->addon_program($request);
                } else {
                    throw new Exception('Failed !');
                }
            });
            return redirect()
                ->route('cpanel.product.item.list', $request->product)
                ->with('success', 'Data has been successfully updated.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function main_program($request)
    {
        $request->validate([
            'name_id' => 'required|min:2',
        ]);
        $payload = [
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug_id' => Str::slug($request->name_id),
            'slug_en' => Str::slug($request->name_en),
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'admin_fee' => $request->admin_fee ? preg_replace('/[^\d]+/', '', $request->admin_fee) : null,
            'price_idr' => preg_replace('/[^\d]+/', '', $request->price_idr),
            'unit_idr' => $request->unit_idr,
            'price_usd' => $request->price_usd ? preg_replace('/[^\d]+/', '', $request->price_usd) : null,
            'unit_usd' => $request->unit_usd,
            'discount_usd' => 0,
            'discount_idr' => 0,
            'status' => $request->status ? 'active' : 'inactive',
            'updated_by' => auth()->user()->id,
            'updated_at' => now(),
        ];

        if($request->banner) {
            $payload['banner'] = $this->upload_banner($request);
        }
        
        // Update Product Item
        $product_item = ProductItem::find($request->id);
        $addons = $product_item->productAddons;
        $product_item->update($payload);

        $product_item->productAddons()->detach($addons);
        if ($request->has('addon')) {
            $selectedAddons = $request->addon;

            $product_item->productAddons()->attach($selectedAddons, [
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);
        }

        // Log Action
        Log::logAction($request, 'Product', 'Update', 'Updating Primary Program  with Code= '.$product_item->code);

        return $product_item;
    }

    protected function addon_program($request)
    {
        $request->validate([
            'name_id' => 'required|min:2',
        ]);

        $payload = [
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug_id' => Str::slug($request->name_id),
            'slug_en' => Str::slug($request->name_en),
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'price_idr' => preg_replace('/[^\d]+/', '', $request->price_idr),
            'unit_idr' => $request->unit_idr,
            'price_usd' => $request->price_usd ? preg_replace('/[^\d]+/', '', $request->price_usd) : null,
            'unit_usd' => $request->unit_usd,
            'price_type' => $request->price_type,
            'status' => $request->status ? 'active':'inactive',
            'updated_by' => auth()->user()->id,
            'updated_at' => now(),
        ];

        if($request->banner) {
            $payload['banner'] = $this->upload_banner($request);
        }

        $addon = ProductAddon::find($request->id);
        $addon->update($payload);

        Log::logAction($request, 'Product', 'Update', 'Updating Secondary Program (Addon) with Code= '.$addon->code);
    }

    private function upload_banner($request)
    {
        $file_name = null;
        if($request->banner) {
            $path = 'uploads/medmaestro/products/items/banners/';
            $file_name = Helper::uploadImage($request->banner, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}