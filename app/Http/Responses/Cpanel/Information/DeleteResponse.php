<?php

namespace App\Http\Responses\Cpanel\Information;

use App\Models\Log;
use App\Models\Information;
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
        $information = Information::find($request->id);
        Log::logAction($request, 'Information', 'Delete', 'Deleting Information title='.$information->title);

        return $information->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}