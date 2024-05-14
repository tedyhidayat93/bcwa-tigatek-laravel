<?php

namespace App\Http\Responses\Cpanel\Program\Type;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.program.type.form', [
                'method' => 'post',
                'programs' => $this->programs(),
                'data' => new ProgramCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function programs()
    {
        return Program::get();
    }
}
