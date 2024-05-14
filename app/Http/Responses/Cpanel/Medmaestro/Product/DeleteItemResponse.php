<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Log;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\ProductItem;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteItemResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {

        if($request->type == 'primary') {
            $data = ProductItem::find($request->id);
        } else if($request->type == 'secondary') {
            $data = ProductAddon::find($request->id);
        } else {
            throw new Exception('Failed !');
        }

        Log::logAction($request, 'Product', 'Delete', 'Deleting Product Item Code='.$data->code);

        return $data->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}