<?php

namespace App\Http\Responses\Cpanel\Medizine\Category;

use App\Models\PostCategory;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medizine.category.form', [
                'method' => 'post',
                'types' => $this->type(),
                'data' => new PostCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function type()
    {
        return PostCategory::get();
    }
}