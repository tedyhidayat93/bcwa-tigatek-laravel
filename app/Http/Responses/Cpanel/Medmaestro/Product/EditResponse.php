<?php

namespace App\Http\Responses\Cpanel\Medmaestro\Product;

use App\Models\Participant;
use App\Models\ParticipantType;
use App\Models\ParticipantCategory;
use App\Models\ParticipantSubCategory;
use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            $data = $this->data();
            return view('pages.cpanel.medmaestro.product.form', [
                'method' => 'put',
                'types' => $this->types(),
                'categories' => $this->categories(),
                'sub_categories' => $this->sub_categories($data),
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function data()
    {
        $participant = Participant::findOrFail($this->id);

        $socmed = (array)json_decode($participant->social_media);
        $participant->instagram = $socmed['instagram'];
        $participant->twitter = $socmed['twitter'];
        $participant->facebook = $socmed['facebook'];
        $participant->linkedin = $socmed['linkedin'];
        $participant->youtube = $socmed['youtube'];
        $participant->tiktok = $socmed['tiktok'];

        return $participant;
    }

    private function types()
    {
        return ParticipantType::orderBy('name','asc')->get();
    }

    private function categories()
    {
        return ParticipantCategory::orderBy('name','asc')->get();
    }

    private function sub_categories($data)
    {
        return ParticipantSubCategory::where('participant_category_id',$data->participant_category_id)
                ->orderBy('name','asc')
                ->get();
    }
}