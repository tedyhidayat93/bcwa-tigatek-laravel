<?php

namespace App\Http\Responses\Frontpage\About;

use App\Models\Mentor;
use App\Models\Partner;
use App\Models\PostCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            $data = [
                'partners' => $this->partners(),
                'mentors' => $this->mentors(),
            ];
            return view('pages.public.about.index', $data);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function partners()
    {
        return Partner::get();
    }

    private function mentors()
    {
        return Mentor::orderBy('sequence', 'ASC')
            ->get();
    }
}
