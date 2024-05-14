<?php

namespace App\Http\Responses\Cpanel\UserManagement\Log;

use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.user_management.log.list', [
                'logs' => $this->data($request),
                'users' => $this->users($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = Log::select('*');

        $data = $data->when($request->user, function($query) use ($request) {
            $query->where('user_id', $request->user);
        });
        $data = $data->when($request->module, function($query) use ($request) {
            $query->where('module', $request->module);
        });
        $data = $data->when($request->action, function($query) use ($request) {
            $query->where('action', $request->action);
        });
        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('module', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('message', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('device', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('city', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('address', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('user_agent', 'LIKE','%'.$request->keyword.'%');
        });

        if($request->sort_by){
            switch(TRUE) {
                case ($request->sort_by == 'newest'):
                    $data = $data->orderBy('id', 'desc');
                    break;
                case ($request->sort_by == 'oldest'):
                    $data = $data->orderBy('id', 'asc');
                    break;
                }
        } else {
            $data = $data->orderBy('id', 'asc');
        }

        $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

        return $data;
    }

    private function users()
    {
        return User::orderBy('name', 'ASC')->get();
    }
}