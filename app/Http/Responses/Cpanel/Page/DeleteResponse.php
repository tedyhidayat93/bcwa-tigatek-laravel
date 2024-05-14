<?php

namespace App\Http\Responses\Cpanel\Page;

use App\Models\Log;
use App\Models\Page;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                Page::find($request->id);
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
        $page = Page::find($request->id);
        Log::logAction($request, 'Page', 'Delete', 'Deleting Page name='.$page->name);

        return $page->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}