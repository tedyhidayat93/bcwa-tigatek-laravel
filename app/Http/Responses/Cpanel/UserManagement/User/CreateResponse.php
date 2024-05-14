<?php

namespace App\Http\Responses\Cpanel\UserManagement\User;

use App\Models\PostCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medizine.type.form', [
                'method' => 'post',
                'programs' => $this->program(),
                'data' => new PostCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function program()
    {
        return Program::get();
    }
}