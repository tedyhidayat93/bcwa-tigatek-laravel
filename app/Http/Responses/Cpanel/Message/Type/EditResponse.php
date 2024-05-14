<?php

namespace App\Http\Responses\Cpanel\Message\Type;

use App\Models\Message;
use App\Models\MessageType;
use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.message.type.form', [
                'method' => 'put',
                'messages' => $this->messages(),
                'data' => $this->data()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function data()
    {
        return MessageType::findOrFail($this->id);
    }

    private function messages()
    {
        return Message::get();
    }
}
