<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::orderBy("sequence", "ASC")->get();
        // dd($packages);
        return view('pages.public.home.index', [
            "packages" => $packages
        ]);
    }
}
