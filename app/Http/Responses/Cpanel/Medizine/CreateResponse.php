<?php

namespace App\Http\Responses\Cpanel\Medizine;

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    public function toResponse($request)
    {
        try {
            return view('pages.cpanel.medizine.post.form', [
                'method' => 'post',
                'categories' => $this->category(),
                'post_authors' => [],
                'authors' => $this->authors(),
                'data' => new PostCategory()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function category()
    {
        return PostCategory::get();
    }

    private function authors()
    {
        $data = User::select('*');

        if(in_array('writer', auth()->user()->getRoleNames()->toArray())) {
            $data = $data->role(['writer']);
        }

        $data = $data->get();

        return $data;
    }
}