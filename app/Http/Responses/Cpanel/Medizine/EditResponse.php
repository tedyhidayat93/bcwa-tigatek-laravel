<?php

namespace App\Http\Responses\Cpanel\Medizine;

use App\Models\Post;
use App\Models\PostAuthor;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\Models\Role;

class EditResponse implements Responsable
{
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            $data = $this->data();
            return view('pages.cpanel.medizine.post.form', [
                'method' => 'put',
                'categories' => $this->category(),
                'authors' => $this->authors(),
                'post_authors' => $this->post_authors(),
                'sub_categories' => $this->sub_category($data),
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function data()
    {
        return Post::findOrFail($this->id);
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

    private function post_authors()
    {
        $data = [];
        $post_authors = PostAuthor::select('user_id')->where('post_id', $this->id)->get();
        foreach($post_authors as $author) {
            array_push($data, $author->user_id);
        }
        return $data;
    }

    private function sub_category($data)
    {
        return PostSubCategory::where('post_category_id',$data->post_category_id)->get();
    }
}