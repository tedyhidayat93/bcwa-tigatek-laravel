<?php

namespace App\Http\Responses\Cpanel\Message\Type;

use App\Models\Log;
use App\Models\Message;
use App\Models\MessageType;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        // dd($this->data($request));
        try {
            return view('pages.cpanel.message.type.list', [
                'types' => $this->data($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Message Category', 'Read', 'Accessing Message Category');

        $data = MessageType::select('*');

        $data = $data->when($request->keyword, function($query) use ($request) {
            $query->where('name', 'LIKE','%'.$request->keyword.'%');
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
}
