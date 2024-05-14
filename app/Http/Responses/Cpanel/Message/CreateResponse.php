<?php

namespace App\Http\Responses\Cpanel\Message;

use App\Models\Message;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.message.form', [
                'method' => 'post',
                'data' => new Message()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}