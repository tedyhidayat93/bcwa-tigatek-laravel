<?php

namespace App\Http\Responses\Cpanel\Configurations\Ui\Slider;

use App\Models\Slider;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.configurations.ui.index', [
                'sliders' => $this->data($request),
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = Slider::select('*');
        $data = $data->where('status', 1);
        $data = $data->get();
        return $data;
    }
}
