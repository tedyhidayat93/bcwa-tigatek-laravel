<?php

namespace App\Http\Responses\Cpanel\Mentor;

use App\Models\Log;
use App\Models\Mentor;
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
        $Mentor = Mentor::find($request->id);
        Log::logAction($request, 'Mentor', 'Delete', 'Deleting Mentor name='.$Mentor->name);

        return $Mentor->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}