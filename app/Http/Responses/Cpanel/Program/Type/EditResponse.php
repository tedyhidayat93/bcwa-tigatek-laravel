<?php

namespace App\Http\Responses\Cpanel\Program\Type;

use App\Models\Program;
use App\Models\ProgramCategory;
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
            return view('pages.cpanel.program.type.form', [
                'method' => 'put',
                'programs' => $this->programs(),
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
        return ProgramCategory::findOrFail($this->id);
    }

    private function programs()
    {
        return Program::get();
    }
}
