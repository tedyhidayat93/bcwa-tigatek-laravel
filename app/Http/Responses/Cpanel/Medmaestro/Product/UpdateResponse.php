<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.product.item.list', $request->id)
                ->with('success', 'Data has been successfully updated.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $request->validate([
            'name_id' => 'required|min:2',
            'name_en' => 'required|min:2',
        ]);
        $payload = [
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug_id' => Str::slug($request->name_id),
            'slug_en' => Str::slug($request->name_en),
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'status' => 'active',
            'updated_by' => auth()->user()->id,
            'updated_at' => now(),
        ];

        if($request->banner) {
            $payload['banner'] = $this->upload_banner($request);
        }

        Product::where('id', $request->id)
            ->update($payload);

        Log::logAction($request, 'Product', 'Update', 'Updating Product with Document Number= '.$request->doc_number);
    }

    private function upload_banner($request)
    {
        $file_name = null;
        if($request->banner) {
            $path = 'uploads/medmaestro/products/banners/';
            $file_name = Helper::uploadImage($request->banner, $path, 'with_thumb_size');
        }

        return $file_name;
    }
}