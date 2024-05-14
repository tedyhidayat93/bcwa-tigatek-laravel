<?php

namespace App\Http\Responses\Cpanel\Mentor;

use App\Models\Mentor;
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
            return view('pages.cpanel.mentor.form', [
                'method' => 'put',
                'data' => $this->data()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function data()
    {

        $data = Mentor::findOrFail($this->id);
        $socmed = (array)json_decode($data->social_media);
        $data->instagram = $socmed['instagram'];
        $data->twitter = $socmed['twitter'];
        $data->facebook = $socmed['facebook'];
        $data->whatsapp = $socmed['whatsapp'];
        $data->linkedin = $socmed['linkedin'];
        $data->youtube = $socmed['youtube'];
        $data->tiktok = $socmed['tiktok'];
        $data->phone = $socmed['phone'];

        return $data;
    }
}