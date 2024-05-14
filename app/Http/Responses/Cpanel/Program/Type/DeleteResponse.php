<?php

namespace App\Http\Responses\Cpanel\Program\Type;

use App\Models\Log;
use App\Models\ProgramCategory;
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
        $type = ProgramCategory::find($request->id);

        Log::logAction($request, 'Program Type', 'Delete', 'Deleting Program Type name='.$type->name);

        return $type->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}