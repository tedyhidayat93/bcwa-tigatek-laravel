<?php

namespace App\Http\Responses\Cpanel\Medizine;

use App\Helpers\Helper;
use App\Models\Log;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
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
                ->route('cpanel.medizine.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    protected function data($request)
    {
        $code = $this->get_latest_code($request->category);

        $payload = [
            'post_category_id' => $request->category,
            'post_sub_category_id' => $request->sub_category,
            'title' => $request->title,
            'code' => $code,
            'slug' => Str::slug($request->title),
            'caption' => $request->caption,
            'keywords' => $request->keywords,
            'content_medizine' => $request->content_medizine,
            'reference' => $request->reference,
            'cites' => $request->cites,
            'contributors' => $request->contributors,
            'thumbnail_cover_share' => $this->upload_thumbnail_cover_share($request),
            'show_cover_type' => $request->show_cover_type,
            'cover_link' => $request->cover_link,
            'cover_image' => $this->upload_cover_image($request),
            'attachment' => $this->upload_attachment($request),
            'can_export_pdf' => (int)$request->can_export_pdf ?? 0,
            'is_highlight' => (int)$request->is_highlight ?? 0,
            'created_by' => auth()->user()->id,
            'created_at' => now()
        ];

        if($request->is_publish == 1) {
            $payload['is_publish'] = $request->is_publish;
            $payload['publish_by'] = auth()->user()->id;
        }

        $payload['history'] = json_encode([
            [
                'by' => auth()->user()->name,
                'datetime' => Carbon::now(),
                'message' => 'Dibuat oleh '. auth()->user()->name,
            ]
        ]);

        $store = Post::create($payload);

        $this->store_authors($store->id, $request);

        Log::logAction($request, 'Article', 'Create', 'Created Article code= '.$code);
    }

    protected function store_authors($article_id, $request)
    {
        $authors = [];

        foreach($request->authors as $author) {
            array_push($authors, [
                'user_id' => $author,
                'post_id' => $article_id,
                'last_update_at' => now(),
                'is_active' => 1,
                'created_by' => auth()->user()->id,
                'created_at' => now()
            ]);
        }
        return DB::table('post_authors')->insert($authors);
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

    private function get_latest_code($type_id)
    {
        $type = PostCategory::findOrFail($type_id);

        $lastArticle = Post::where('post_category_id', $type->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastArticle) {
            $lastCode = $lastArticle->code;
            $lastNumber = intval(substr($lastCode, strlen('FCTR.' . $type->code)));
        } else {
            $lastNumber = 0;
        }

        $newNumber = $lastNumber + 1;

        $newCode = 'FCTR.' . $type->code . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newCode;
    }
}