<?php

namespace App\Http\Responses\Cpanel\Program;

use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.program.form', [
                'method' => 'post',
                'data' => new Program()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}