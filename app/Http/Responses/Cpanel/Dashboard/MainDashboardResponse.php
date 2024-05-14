<?php

namespace App\Http\Responses\Cpanel\Dashboard;

use App\Models\Log;
use App\Models\Mentor;
use Illuminate\Contracts\Support\Responsable;

class MainDashboardResponse implements Responsable
{
    public function toResponse($request)
    {
        try {

            $data = [
                'totlas' => [
                    'article' => 0,
                    'product_item' => 0,
                    'event' => 0,
                    'participant' => 0,
                    'mentor' => 0,
                    'feedback' => 0,
                    'partner' => 0,
                ]
            ];

            if(auth()->user()->hasRole('super-admin')) {
                $view ="pages.cpanel.dashboard.index";
            } else {
                $view ="pages.cpanel.dashboard.index2";
            }

            return view($view, $data);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}