<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy("created_at", "DESC")->take(10)->get();
        return view('pages.cpanel.dashboard.index', [
            'trx_counter' => $this->trx_counter(),
            'transactions' => $transactions
        ]);
    }

    private function trx_counter()
    {
        $pending = Transaction::where("status", "PENDING")->whereNull("payment_proof")->count();
        $waitting_confirmation = Transaction::where("status", "PENDING")->whereNotNull("payment_proof")->count();
        $rejected = Transaction::where("status", "REJECTED")->count();
        $expired = Transaction::where("status", "EXPIRED")->count();
        $paid = Transaction::where("status", "PAID")->count();
        $total_income_paid = Transaction::where("status", "PAID")->sum('amount');

        return [
            'pending' => $pending,
            'waitting_confirmation' => $waitting_confirmation,
            'expired' => $expired,
            'rejected' => $rejected,
            'paid' => $paid,
            'total_income_paid' => $total_income_paid,
        ];
    }
}
