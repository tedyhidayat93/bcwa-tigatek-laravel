<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Transaction::select('*');

            $data = $data->when($request->keyword, function($query) use ($request) {
                $query->where('name', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('inv_number', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('email', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('whatsapp', 'LIKE','%'.$request->keyword.'%');
            });

            switch(true) {
                case ($request->sort_by == 'newest'):
                    $data = $data->orderBy('id', 'desc');
                    break;
                case ($request->sort_by == 'oldest'):
                    $data = $data->orderBy('id', 'asc');
                    break;
                default:
                    $data = $data->orderBy('id', 'asc');
                    break;
            }

            $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

            $total_income = Transaction::where("status", "PAID")->sum('amount');

            return view('pages.cpanel.transaction.list', [
                'total_income_paid' => $total_income,
                'transactions' => $data
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {

                switch (TRUE) {
                    case (strtoupper($request->status) == "PENDING"):
                        // dd('PENDING');
                        $payload = [
                            'status' => 'PENDING',
                            'note' => $request->note,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => now()
                        ];
                        // dd($payload);
                        break;
                    case (strtoupper($request->status) == "EXPIRED"):
                        // dd('EXPPIRED');
                        $payload = [
                            'status' => 'EXPIRED',
                            'updated_by' => auth()->user()->id,
                            'note' => $request->note,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => now()
                        ];
                        // dd($payload);
                        break;
                    case (strtoupper($request->status) == "PAID"):
                        // dd('PAID');
                        $payload = [
                            'status' => 'PAID',
                            'paid_at' => now(),
                            'note' => $request->note,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => now()
                        ];
                        // dd($payload);
                        break;
                    case (strtoupper($request->status) == "REJECTED"):
                        // dd('REJECTED');
                        $payload = [
                            'status' => 'REJECTED',
                            'rejected_at' => now(),
                            'note' => $request->note,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => now()
                        ];
                        // dd($payload);
                        break;
                }

                $transaction = Transaction::find($request->id);
                $transaction->update($payload);
            });
            return redirect()
                ->route('cpanel.transaction.list')
                ->with('success', 'Data berhasil diperbarui..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $transaction = Transaction::find($request->id);
                // dd($transaction);
                $transaction->update([
                    'deleted_by' => auth()->user()->id,
                    'deleted_at' => now()
                ]);
            });
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
