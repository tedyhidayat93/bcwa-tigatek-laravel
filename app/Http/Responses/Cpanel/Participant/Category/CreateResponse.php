<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\ParticipantCategory;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.participant.category.form', [
                'method' => 'post',
                'types' => $this->type(),
                'data' => new ParticipantCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function type()
    {
        return ParticipantCategory::get();
    }
}