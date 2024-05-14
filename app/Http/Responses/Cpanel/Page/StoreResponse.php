<?php

namespace App\Http\Responses\Cpanel\Page;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Page;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            DB::transaction(function () use ($request) {
                return $this->data($request);
            });
            return redirect()
                ->route('cpanel.page.list')
                ->with('success', 'Data has been successfully saved.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $cek = Page::where('name',$request->name)->get();

        if(!empty($cek)) {
            throw new \Exception('The page name has already been used. Please use another name.');
        }

        $payload = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'code' => null,
            'type' => 'page',
            'caption' => $request->caption,
            'value' => $request->value,
            'is_active' => $request->is_active,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        $store = Page::create($payload);

        Log::logAction($request, 'Page', 'Create', 'Created Page name='.$request->name);

        return $store;
    }
}
