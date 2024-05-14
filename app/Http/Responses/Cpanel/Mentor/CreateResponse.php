<?php

namespace App\Http\Responses\Cpanel\Mentor;

use App\Models\Mentor;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.mentor.form', [
                'method' => 'post',
                'data' => new Mentor()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}