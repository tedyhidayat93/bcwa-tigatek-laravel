<?php

namespace App\Http\Responses\Cpanel\Medizine;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Post;
use App\Models\PostAuthor;
use Carbon\Carbon;
use Exception;
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
                ->route('cpanel.medizine.list')
                ->with('success', 'The data has been successfully updated..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {

        $payload = [
            'post_category_id' => $request->category,
            'post_sub_category_id' => $request->sub_category,
            'code' => $request->code,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'caption' => $request->caption,
            'keywords' => $request->keywords,
            'content_medizine' => $request->content_medizine,
            'reference' => $request->reference,
            'cites' => $request->cites,
            'contributors' => $request->contributors,
            'show_cover_type' => $request->show_cover_type,
            'cover_link' => $request->cover_link,
            'can_export_pdf' => (int)$request->can_export_pdf ?? 0,
            'is_highlight' => (int)$request->is_highlight ?? 0,
            'updated_by' => auth()->user()->id,
            'updated_at' => now()
        ];
        
        if($request->thumbnail_cover_share) {
            $payload['thumbnail_cover_share'] = $this->upload_thumbnail_cover_share($request);
        }
        if($request->cover_image) {
            $payload['cover_image'] = $this->upload_cover_image($request);
        }
        if($request->attachment) {
            $payload['attachment'] = $this->upload_attachment($request);
        }
        
        if($request->is_publish == 1) {
            $payload['is_publish'] = $request->is_publish;
            $payload['publish_by'] = auth()->user()->id;
        } else {
            $payload['is_publish'] = 0;
        }
        
        $payload['history'] = json_encode($this->add_history($request));

        $post = Post::find($request->id);
        
        if(auth()->user()->id == $post->created_by) {
            if(!$request->authors) throw new Exception('Author cannot be empty !');
            if(!in_array(auth()->user()->id, $request->authors) && auth()->user()->hasRole('writter')) throw new Exception('Do not delete yourself as the author !');
        }
        
        $post->update($payload);
        
        $post->authors()->delete();
        foreach ($request->authors as $user_id) {
            $post->authors()->create([
                'user_id' => $user_id,
                'last_update_at' => now(),
                'is_active' => 1,
                'created_by' => auth()->user()->id,
                'created_at' => now()
            ]);
        }
        
        Log::logAction($request, 'Article', 'Update', 'Updating Article where code='.$post->code);
        
        return $post;
    }
    
    protected function add_history($request)
    {
        $history_data = [
            'by' => auth()->user()->name,
            'datetime' => Carbon::now(),
            'message' => 'Updated by ' . auth()->user()->name,
        ];

        $post = Post::find($request->id);
        $history = json_decode($post->history, true) ?? [];
        $history[] = $history_data;
        return $history;
    }

    private function upload_thumbnail_cover_share($request)
    {
        $file_name = null;
        if($request->thumbnail_cover_share) {
            $path = 'uploads/article/thumbnail/';
            $file_name = Helper::uploadImage($request->thumbnail_cover_share, $path, 'complete_size');
        }

        return $file_name;
    }

    private function upload_cover_image($request)
    {
        $file_name = null;
        if($request->cover_image) {
            $path = 'uploads/article/cover/';
            $file_name = Helper::uploadImage($request->cover_image, $path, 'complete_size');
        }

        return $file_name;
    }

    private function upload_attachment($request)
    {
        $data = null;
        if($request->attachment) {
            $path = 'uploads/article/attachment/';
            $file_name = Helper::uploadFile($request->attachment, $path);
            $data = json_encode([
                'title' => $request->attachment_file_name,
                'file_name' => $file_name,
                'path' => $path,
            ]);
        }

        return $data;
    }
}