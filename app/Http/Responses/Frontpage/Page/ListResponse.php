<?php

namespace App\Http\Responses\Frontpage\Page;

use App\Models\Page;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public $slug_page;

    public function __construct($slug_page) {
        $this->slug_page = $slug_page;
    }

    public function toResponse($request)
    {
        try {
            return view('pages.public.page.index', [
                'page' => $this->page()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function page()
    {
        $data = Page::select('*')
                ->where('slug',$this->slug_page)
                // ->where('is_active',1)
                ->first();
        return $data;
    }
}
