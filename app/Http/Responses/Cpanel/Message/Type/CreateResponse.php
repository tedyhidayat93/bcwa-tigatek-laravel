<?php

namespace App\Http\Responses\Cpanel\Message\Type;

use App\Models\Message;
use App\Models\MessageType;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.message.type.form', [
                'method' => 'post',
                'messages' => $this->messages(),
                'data' => new MessageType()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function messages()
    {
        return Message::get();
    }
}
