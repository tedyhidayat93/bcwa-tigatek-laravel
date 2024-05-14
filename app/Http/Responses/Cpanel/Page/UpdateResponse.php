<?php

namespace App\Http\Responses\Cpanel\Page;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Page;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.page.list')
                ->with('success', 'The data has been successfully updated..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $cek = Page::where('name',$request->name)->first();

        $payload = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'type' => 'page',
            'caption' => $request->caption,
            'value' => $request->value,
            'is_active' => $request->is_active,
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];

        $page = Page::find($request->id);
        $page->update($payload);

        Log::logAction($request, 'Page', 'Update', 'Update Page name='.$request->name);

        return $page;
    }
}
