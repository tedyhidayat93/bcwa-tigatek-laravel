<?php

namespace App\Http\Responses\Cpanel\Participant;

use App\Models\Log;
use App\Models\Participant;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use App\Models\ParticipantType;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.participant.data.list',[
                'participants' => $this->data($request),
                'types' => $this->types($request),
                'categories' => $this->categories($request),
                'sub_categories' => $this->sub_categories($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        // Log::logAction($request, 'Participant', 'Read', 'Accessing Participant List');

        $data = $this->query_filter($request);

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

    private function query_filter($request)
    {
        $data = Participant::with(['type','category','sub_category'])->select('*');

        $data = $data->when($request->gender && $request->gender != 'all', function($query) use ($request) {
            $query->where('gender', $request->gender);
        });

        $data = $data->when($request->type && $request->type != 'all', function($query) use ($request) {
            $query->where('participant_type_id', $request->type);
        });

        $data = $data->when($request->category && $request->category != 'all', function($query) use ($request) {
            $query->where('participant_category_id', $request->category);
        });

        $data = $data->when($request->sub_category && $request->sub_category != 'all', function($query) use ($request) {
            $query->where('participant_sub_category_id', $request->category);
        });

        $data = $data->when($request->date, function($query) use ($request) {
            $date_range = explode(" - ", $request->date);
            $start_date = Carbon::createFromFormat('d/m/y', $date_range[0])->startOfDay();
            $end_date = Carbon::createFromFormat('d/m/y', $date_range[1])->endOfDay();
            $query->whereBetween('created_at', [$start_date, $end_date]);
        });

        $data = $data->when(!empty($request->keyword), function($query) use ($request) {
            $query->orWhere('name', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('lastname', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('fullname', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('email', 'LIKE','%'.$request->keyword.'%');
            $query->orWhere('whatsapp', 'LIKE','%'.$request->keyword.'%');
        });

        return $data;
    }

    private function types()
    {
        return ParticipantType::get();
    }

    private function categories($request)
    {
        $data = ParticipantCategory::select('*');
        $data = $data->get();
        return $data;
    }

    private function sub_categories($request)
    {
        $data = ParticipantSubCategory::select('*');
        $data = $data->get();
        return $data;
    }

}