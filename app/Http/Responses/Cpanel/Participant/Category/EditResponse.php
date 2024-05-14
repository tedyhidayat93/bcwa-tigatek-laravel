<?php

namespace App\Http\Responses\Cpanel\Participant\Category;

use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
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
            return view('pages.cpanel.participant.category.form', [
                'method' => 'put',
                'types' => $this->type(),
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
        return ParticipantCategory::findOrFail($this->id);
    }

    private function type()
    {
        return ParticipantCategory::get();
    }
}