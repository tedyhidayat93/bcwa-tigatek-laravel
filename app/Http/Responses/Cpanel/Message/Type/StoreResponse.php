<?php

namespace App\Http\Responses\Cpanel\Message\Type;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\MessageType;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.message.type.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Message Type', 'Create', 'Created Message Type name='.$request->name);

        return MessageType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
    }
}