<?php

namespace App\Http\Responses\Cpanel\UserManagement\Permission;

use App\Models\PostSubCategory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class DeleteResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request->id);
            });
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($id)
    {
        PostSubCategory::where('id', $id)->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}