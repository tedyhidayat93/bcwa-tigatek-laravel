<?php

namespace App\Http\Responses\Cpanel\Configurations\System;

use App\Models\ConfigVariable;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.configurations.system.index', [
                'configs' => $this->data($request),
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $data = ConfigVariable::select('*');
        $data = $data->where('group', $request->group);
        $data = $data->where('is_active', 1);
        $data = $data->get();
        return $data;
    }
}
