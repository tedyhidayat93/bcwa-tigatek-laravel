<?php

namespace App\Http\Responses\Frontpage\Contact;

use App\Models\Message;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class CreateMessageResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->back()
                ->with('success', 'Pesanmu berhasil dikirm.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        return Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type_id' => $request->subject,
            'more_subject' => $request->more_subject ?? null,
            'message' => $request->message,
            'created_at' => now()
        ]);
    }
}