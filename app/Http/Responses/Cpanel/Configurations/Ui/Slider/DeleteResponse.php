<?php

namespace App\Http\Responses\Cpanel\Configurations\Ui\Slider;

use App\Helpers\Helper;
use App\Models\Slider;
use App\Models\Log;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeleteResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->back()
                ->with('success', 'successfully deleting slider.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $ui = Slider::find($request->id);

        Log::logAction($request, 'UI Frontend Slider', 'Delete', 'Deleting Slider Frontend "'.$ui->title.'"');

        return $ui->update([
            'deleted_by' => auth()->user()->id,
            'deleted_at' => now()
        ]);
    }

}