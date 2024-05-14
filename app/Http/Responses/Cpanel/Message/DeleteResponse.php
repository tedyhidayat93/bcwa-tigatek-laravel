<?php

namespace App\Http\Responses\Cpanel\Message;

use App\Models\Log;
use App\Models\MessageType;
use App\Models\Message;
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
            return back()->with('success', 'Data successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $message = Message::find($request->id);
        $message->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
        Log::logAction($request, 'Message Type', 'Delete', 'Deleting Message From='.$message->name);

    }
}