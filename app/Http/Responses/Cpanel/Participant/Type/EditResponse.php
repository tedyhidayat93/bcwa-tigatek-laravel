<?php

namespace App\Http\Responses\Cpanel\Participant\Type;

use App\Models\ParticipantType;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.participant.type.form', [
                'method' => 'put',
                'programs' => $this->program(),
                'data' => $this->data()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function data()
    {
        return ParticipantType::findOrFail($this->id);
    }

    private function program()
    {
        return Program::get();
    }
}