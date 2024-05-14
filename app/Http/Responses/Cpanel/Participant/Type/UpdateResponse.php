<?php

namespace App\Http\Responses\Cpanel\Participant\Type;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\ParticipantType;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.participant.type.list')
                ->with('success', 'Successfully Updated Data.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        Log::logAction($request, 'Participant Type', 'Update', 'Updating Participant Type name='.$request->name);

        $payload = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];

        return ParticipantType::where('id', $request->id)->update($payload);
    }
}