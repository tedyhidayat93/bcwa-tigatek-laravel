<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HandlerController extends Controller
{
    public function paymentPaid(Request $request)
    {
        return view('pages.public.handler.payment-paid');
    }

    public function feedbackSent(Request $request)
    {
        return view('pages.public.handler.feedback-sent');
    }
}
