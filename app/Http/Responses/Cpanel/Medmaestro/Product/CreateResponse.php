<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Participant;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use App\Models\ParticipantType;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medmaestro.product.form', [
                'method' => 'post',
                'types' => $this->types(),
                'categories' => $this->categories(),
                'sub_categories' => $this->sub_categories(),
                'data' => new Participant()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function types()
    {
        return ParticipantType::orderBy('name','asc')->get();
    }

    private function categories()
    {
        return ParticipantCategory::orderBy('name','asc')->get();
    }

    private function sub_categories()
    {
        $data = ParticipantSubCategory::select('*')->orderBy('name','asc');
        $data = $data->get();
        return $data;
    }
}