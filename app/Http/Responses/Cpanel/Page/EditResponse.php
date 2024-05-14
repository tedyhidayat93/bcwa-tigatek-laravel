<?php

namespace App\Http\Responses\Cpanel\Page;

use App\Models\Page;
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
            return view('pages.cpanel.page.form', [
                'method' => 'put',
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
        return Page::findOrFail($this->id);
    }
}