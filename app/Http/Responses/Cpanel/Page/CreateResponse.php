<?php

namespace App\Http\Responses\Cpanel\Page;

use App\Models\Page;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.page.form', [
                'method' => 'post',
                'data' => new Page()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}