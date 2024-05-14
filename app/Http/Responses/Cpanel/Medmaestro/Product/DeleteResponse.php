<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Log;
use App\Models\Product;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return back()->with('success', 'Data successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = Product::find($request->id);
        Log::logAction($request, 'Product', 'Delete', 'Deleting Product Document Number='.$data->doc_number);

        return $data->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}