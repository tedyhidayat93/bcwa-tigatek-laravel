<?php

namespace App\Http\Responses\Cpanel\UserManagement\User;

use App\Models\PostCategory;
use App\Models\Program;
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
            return view('pages.cpanel.medizine.type.form', [
                'method' => 'put',
                'programs' => $this->program(),
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
        return PostCategory::findOrFail($this->id);
    }

    private function program()
    {
        return Program::get();
    }
}