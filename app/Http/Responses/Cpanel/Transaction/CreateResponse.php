<?php

namespace App\Http\Responses\Cpanel\Transaction;

use App\Models\Transaction;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.transaction.form', [
                'method' => 'post',
                'data' => new Transaction()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}