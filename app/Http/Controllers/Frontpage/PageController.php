<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index($slug, Request $request)
    {
        $slug = trim($slug);
        $data = Page::select('*')
                ->where('slug', $slug)
                ->first();
        try {
            return view('pages.public.page.index', [
                'page' => $data
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

}
