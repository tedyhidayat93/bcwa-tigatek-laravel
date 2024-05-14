<?php

namespace App\Http\Responses\Cpanel\UserManagement\User;

use App\Models\PostCategory;
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
            return back()->with('success', 'Data successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($id)
    {
        PostCategory::where('id', $id)->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }
}