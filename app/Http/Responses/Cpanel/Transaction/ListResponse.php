<?php

namespace App\Http\Responses\Cpanel\Transaction;

use App\Models\Log;
use App\Models\Transaction;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.transaction.list', [
                'transactions' => $this->data($request)
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Transaction', 'Read', 'Accessing Transaction List');

        $data = Transaction::with(['payments','cart']);

        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('payer_name', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('payer_phone', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('payer_email', 'LIKE','%'.$request->keyword.'%');
        });

        switch(true) {
            case ($request->sort_by == 'newest'):
                $data = $data->orderBy('id', 'desc');
                break;
            case ($request->sort_by == 'oldest'):
                $data = $data->orderBy('id', 'asc');
                break;
            default:
                $data = $data->orderBy('id', 'desc');
                break;
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }
}