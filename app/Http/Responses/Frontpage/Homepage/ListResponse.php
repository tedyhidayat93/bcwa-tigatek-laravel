<?php

namespace App\Http\Responses\Frontpage\Homepage;

use App\Models\Information;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public function toResponse($request)
    {
        // dd(count($this->banners()));
        try {
            $data = [
                'hero_sliders' => $this->banners(),
                'banner_info' => [
                    'below_hero' => $this->information()
                ],
                'medizine' => [
                    'highlight' => $this->highligthArticle(),
                    'hits' => $this->hitsArticle(),
                    'latest' => $this->latestArticle(),
                ],
                'events' => [
                    'latest' => []
                ],
                'partners' => $this->partners()
            ];

            return view('pages.public.homepage.index', $data);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function highligthArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', config('constants.active_status'))
                ->where('is_highlight', config('constants.active_status'))
                ->take(4)
                ->get();
        return $data;
    }

    private function hitsArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', config('constants.active_status'))
                ->orderBy('visitor', 'DESC')
                ->take(10)
                ->get();
        return $data;
    }

    private function latestArticle()
    {
        $data = Post::with(['creator', 'type'])
                ->where('is_publish', config('constants.active_status'))
                ->orderBy('created_at', 'DESC')
                ->take(3)
                ->get();
        return $data;
    }

    private function information()
    {
        $data = Information::where('is_active', config('constants.active_status'))->first();
        return $data;
    }

    private function banners()
    {
        $data = Slider::where('status', config('constants.active_status'))
            ->whereNotNull('banner')
            ->get();
        return $data;
    }

    private function eventLatest()
    {
    }

    private function partners()
    {
        return Partner::get();
    }
}
