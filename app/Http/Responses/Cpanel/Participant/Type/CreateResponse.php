<?php

namespace App\Http\Responses\Cpanel\Participant\Type;

use App\Models\ParticipantCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.participant.type.form', [
                'method' => 'post',
                'programs' => $this->program(),
                'data' => new ParticipantCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function program()
    {
        return Program::get();
    }
}