<?php

namespace App\Http\Responses\Cpanel\Program;

use App\Models\Log;
use App\Models\ProgramCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $proram = Program::find($request->id);

        $check = ProgramCategory::where('program_id', $request->id)->count();

        if($check > 0) {
            throw new Exception('Cannot delete program. Because program in used.');
        } else {
            $proram->update([
                'deleted_by' => auth()->user()->id,
                'deleted_at' => now()
            ]);
            Log::logAction($request, 'Program Type', 'Delete', 'Deleting Program name='.$proram->name);
        }

    }
}