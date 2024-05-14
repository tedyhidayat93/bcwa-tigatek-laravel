<?php

namespace App\Http\Responses\Cpanel\Participant\Type;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\ParticipantType;
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
                ->route('cpanel.participant.type.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:participant_types,name',
        ]);

        Log::logAction($request, 'Participant Type', 'Create', 'Created Participant Type name='.$request->name);

        return ParticipantType::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ]);
    }
}