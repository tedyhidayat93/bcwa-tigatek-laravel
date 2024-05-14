<?php

namespace App\Http\Responses\Cpanel\Medizine\Category;

use App\Models\PostCategory;
use App\Models\PostSubCategory;
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
            return view('pages.cpanel.medizine.category.form', [
                'method' => 'put',
                'types' => $this->type(),
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
        return PostSubCategory::findOrFail($this->id);
    }

    private function type()
    {
        return PostCategory::get();
    }
}