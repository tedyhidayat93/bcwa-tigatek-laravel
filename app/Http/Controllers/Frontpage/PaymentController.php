<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        return 1;
    }

    public function invoice(Request $request)
    {
        return view('pages.public.invoice.index');
    }
}
