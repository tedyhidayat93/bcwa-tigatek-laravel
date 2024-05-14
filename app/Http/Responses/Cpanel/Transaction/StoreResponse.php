<?php

namespace App\Http\Responses\Cpanel\Transaction;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Transaction;
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
                ->route('cpanel.transaction.list')
                ->with('success', 'Data has been successfully saved.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $last_sequence = Transaction::orderBy('sequence', 'desc')->value('sequence') + 1;

        $social_media = json_encode([
            'linkedin' => $request->linkedin ?? '#',
            'instagram' => $request->instagram ?? '#',
            'facebook' => $request->facebook ?? '#',
            'twitter' => $request->twitter ?? '#',
            'tiktok' => $request->tiktok ?? '#',
            'youtube' => $request->youtube ?? '#',
            'phone' => $request->phone ?? '#',
            'whatsapp' => $request->whatsapp ?? '#'
        ]);

        $payload = [
            'name' => $request->name,
            'short_bio' => $request->short_bio,
            'avatar' => $this->upload_image($request),
            'social_media' => $social_media,
            'description' => $request->description,
            'sequence' => $last_sequence,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];


        $store = Transaction::create($payload);

        Log::logAction($request, 'Transaction', 'Create', 'Add New Transaction name='.$request->name);

        return $store;
    }

    private function upload_image($request)
    {
        $file_name = null;
        if($request->avatar) {
            $path = 'uploads/transactions/';
            $file_name = Helper::uploadImage($request->avatar, $path, 'complete_size');
        }

        return $file_name;
    }
}