<?php

namespace App\Http\Responses\Cpanel\Partner;

use App\Models\Log;
use App\Models\Partner;
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
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $partner = Partner::find($request->id);
        Log::logAction($request, 'Partner', 'Delete', 'Deleting Partner name='.$partner->name);

        return $partner->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}