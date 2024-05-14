<?php

namespace App\Http\Responses\Cpanel\Partner;

use App\Models\Partner;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.partner.form', [
                'method' => 'post',
                'data' => new Partner()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}