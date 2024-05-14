<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Faq::select('*');
    
            $data = $data->when($request->keyword, function($query) use ($request) {
                $query->where('ask', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('question', 'LIKE','%'.$request->keyword.'%');
            });
    
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

            return view('pages.cpanel.faq.list', [
                'faqs' => $data
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('pages.cpanel.faq.form', [
                'method' => 'post',
                'data' => new Faq()
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
                $cek = Faq::where('ask',$request->ask)->first();
    
                if(!empty($cek)) {
                    throw new \Exception("Pertanyaan {$request->ask} sudah ada. Buat pertanyaan lainnya.");
                }
                $payload = [
                    'ask' => $request->ask,
                    'question' => $request->question,
                    'is_active' => $request->is_active,
                    'sequence' => Faq::latest()->first()->sequence + 1,
                    'created_by' => auth()->user()->id,
                    'created_at' => now()
                ];
                Faq::create($payload);
            });
            return redirect()
                ->route('cpanel.faq.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $data = Faq::findOrFail($id);
        try {
            return view('pages.cpanel.faq.form', [
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
                $cek = Faq::where('ask',$request->ask)->first();
                $payload = [
                    'ask' => $request->ask,
                    'question' => $request->question,
                    'is_active' => $request->is_active,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => now()
                ];
                $faq = Faq::find($request->id);
                $faq->update($payload);
            });
            return redirect()
                ->route('cpanel.faq.list')
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
                $faq = Faq::find($request->id);
                // dd($faq);
                $faq->update([
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
