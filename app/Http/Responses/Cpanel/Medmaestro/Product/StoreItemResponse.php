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

class StoreItemResponse implements Responsable
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
                ->with('success', 'Data has been successfully saved.');
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

        $doc_number = $this->get_latest_code($request->product);

        $product_item_data = [
            'code' => $doc_number['code'],
            'number' => $doc_number['number'],
            'product_id' => $request->product,
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug_id' => Str::slug($request->name_id),
            'slug_en' => Str::slug($request->name_en),
            'admin_fee' => $request->admin_fee ? preg_replace('/[^\d]+/', '', $request->admin_fee) : null,
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'price_idr' => preg_replace('/[^\d]+/', '', $request->price_idr),
            'unit_idr' => $request->unit_idr,
            'price_usd' => $request->price_usd ? preg_replace('/[^\d]+/', '', $request->price_usd) : null,
            'unit_usd' => $request->unit_usd,
            'discount_usd' => 0,
            'discount_idr' => 0,
            'status' => $request->status ? 'active' : 'inactive',
            'banner' => $this->upload_banner($request),
            'created_by' => auth()->user()->id,
            'created_at' => now(),
        ];

        // Create Product Item
        $product_item = ProductItem::create($product_item_data);

        if ($request->has('addon')) {
            $selectedAddons = $request->addon;

            $product_item->productAddons()->attach($selectedAddons, [
                'created_by' => auth()->user()->id
            ]);
        }

        // Log Action
        Log::logAction($request, 'Product', 'Create', 'Created Product Item with Code= '.$doc_number['code']);

        return $product_item;
    }

    protected function addon_program($request)
    {
        $request->validate([
            'name_id' => 'required|min:2',
        ]);

        $doc_number = $this->get_latest_code_addon($request->product);

        ProductAddon::create([
            'code' => $doc_number['code'],
            'number' => $doc_number['letter'],
            'product_id' => $request->product,
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
            'banner' => $this->upload_banner($request),
            'created_by' => auth()->user()->id,
            'created_at' => now(),
        ]);

        Log::logAction($request, 'Product', 'Create', 'Created Product Item (Addon) with Code= '.$doc_number['code']);
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

    private function get_latest_code($product_id)
    {
        $product = Product::findOrFail($product_id);

        $last_item = ProductItem::where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->first();

            
        if ($last_item) {
            $last_number = intval($last_item->number); 
        } else {
            $last_number = 0;
        }

        $number = $last_number + 1;
        $new_number = str_pad($number, 2, '0', STR_PAD_LEFT);

        $new_code = $product->doc_number . $number;

        return [
            'code' => $new_code,
            'number' => $new_number,
        ];
    }

    private function get_latest_code_addon($product_id)
    {
        $product = Product::findOrFail($product_id);

        $last_item = ProductAddon::where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($last_item) {
            $last_number = intval(substr($last_item->code, strlen($product->doc_number))); // Mendapatkan angka terakhir dari kode
            $last_letter = substr($last_item->code, -1); // Mendapatkan huruf terakhir dari kode
            if ($last_letter == 'Z') { // Jika huruf terakhir sudah 'Z', maka lanjut ke huruf 'A' dan tambahkan digit
                $last_number++; // Menambah digit angka
                $new_letter = 'A';
            } else {
                $new_letter = chr(ord($last_letter) + 1); // Menambah huruf
            }
        } else {
            $last_number = 1;
            $new_letter = 'A';
        }

        $new_code = $product->doc_number . $new_letter;

        return [
            'code' => $new_code,
            'number' => str_pad($last_number, 2, '0', STR_PAD_LEFT),
            'letter' => $new_letter,
        ];
    }
}