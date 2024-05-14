<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Product;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.product.item.list', $data->id)
                ->with('success', 'Data has been successfully saved.');
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
            // 'doc_number' => 'required|unique:products,doc_number',
        ]);

        $doc_number = $this->get_latest_code($request->type);

        $data = Product::create([
            'code' => $request->code,
            'doc_number' => $doc_number,
            'type_id' => $request->type,
            'name_id' => $request->name_id,
            'name_en' => $request->name_en,
            'slug_id' => Str::slug($request->name_id),
            'slug_en' => Str::slug($request->name_en),
            'description_id' => $request->description_id,
            'description_en' => $request->description_en,
            'banner' => $this->upload_banner($request),
            'status' => 'active',
            'created_by' => auth()->user()->id,
            'created_at' => now(),
        ]);

        Log::logAction($request, 'Product', 'Create', 'Created Product with Document Number= '.$request->doc_number);

        return $data;
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

    private function get_latest_code($type_id)
    {
        $type = Program::findOrFail($type_id); // ambil dari table programs (bukan program_categoires)

        $last_product = Product::where('type_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($last_product) {
            $last_code = $last_product->doc_number;
            $last_number = intval(substr($last_code, strlen('FCTR.' . $type->code)));
        } else {
            $last_number = 0;
        }

        $new_number = $last_number + 1;

        $new_code = 'FCTR.' . $type->code . str_pad($new_number, 2, '0', STR_PAD_LEFT);

        return $new_code;
    }
}