<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Page::select('*');
    
            $data = $data->when($request->keyword, function($query) use ($request) {
                $query->where('code', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('name', 'LIKE','%'.$request->keyword.'%');
            });
            $data = $data->orderBy('is_default', 'desc');
    
            switch(true) {
                case ($request->sort_by == 'newest'):
                    $data = $data->orderBy('id', 'desc');
                    break;
                case ($request->sort_by == 'oldest'):
                    $data = $data->orderBy('id', 'asc');
                    break;
                default:
                    $data = $data->orderBy('id', 'asc');
                    break;
            }
    
            $data = $data->paginate( !empty($request->per_page) ? (int)$request->per_page : config('constants.default_global_pagination'));

            return view('pages.cpanel.page.list', [
                'pages' => $data
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }

    }

    public function create()
    {
        try {
            return view('pages.cpanel.page.form', [
                'method' => 'post',
                'data' => new Page()
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $cek = Page::where('name',$request->name)->first();
    
                if(!empty($cek)) {
                    throw new \Exception("Nama halaman {$request->name} sudah digunakan.");
                }
                $payload = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'code' => $request->code ?? null,
                    'type' => 'page',
                    // 'caption' => $request->caption,
                    'value' => $request->value,
                    'is_active' => $request->is_active,
                    'created_by' => auth()->user()->id,
                    'created_at' => now()
                ];
                Page::create($payload);
            });
            return redirect()
                ->route('cpanel.page.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $data = Page::findOrFail($id);
        try {
            return view('pages.cpanel.page.form', [
                'method' => 'put',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $cek = Page::where('name',$request->name)->first();
                $payload = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'type' => 'page',
                    // 'caption' => $request->caption,
                    'value' => $request->value,
                    'is_active' => $request->is_active,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => now()
                ];
                $page = Page::find($request->id);
                $page->update($payload);
            });
            return redirect()
                ->route('cpanel.page.list')
                ->with('success', 'Data berhasil diperbarui..');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request) 
    {
        try {
            DB::transaction(function () use ($request) {
                $page = Page::find($request->id);
                $page->update([
                    'deleted_by' => auth()->user()->id,
                    'deleted_at' => now()
                ]);
            });
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
