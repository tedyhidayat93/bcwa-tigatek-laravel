<?php

namespace App\Http\Responses\Frontpage\Contact;

use App\Models\MessageType;
use App\Models\PostCategory;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.public.contact.index', [
                'subjects' => $this->subjects()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function subjects()
    {
        return MessageType::get();
    }
}
