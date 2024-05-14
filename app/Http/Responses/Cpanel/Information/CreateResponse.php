<?php

namespace App\Http\Responses\Cpanel\Information;

use App\Models\Information;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.information.form', [
                'method' => 'post',
                'data' => new Information()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}