<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Package::select('*');
    
            $data = $data->when($request->keyword, function($query) use ($request) {
                $query->where('name', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('description', 'LIKE','%'.$request->keyword.'%');
                $query->orWhere('price', 'LIKE','%'.$request->keyword.'%');
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

            return view('pages.cpanel.package.list', [
                'packages' => $data
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
            return view('pages.cpanel.package.form', [
                'method' => 'post',
                'data' => new Package()
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
                $cek = Package::where('name',$request->name)->first();
    
                if(!empty($cek)) {
                    throw new \Exception("Paket {$request->name} sudah ada. Buat paket lainnya.");
                }
                $payload = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'code' => $request->code ?? null,
                    'min_quota' => $request->min_quota,
                    'max_quota' => $request->max_quota,
                    'price' => $request->price,
                    'unit' => $request->unit,
                    'description' => $request->description,
                    'sequence' => Package::latest()->first()->sequence + 1,
                    'is_active' => $request->is_active,
                    'created_by' => auth()->user()->id,
                    'created_at' => now()
                ];
                Package::create($payload);
            });
            return redirect()
                ->route('cpanel.package.list')
                ->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $data = Package::findOrFail($id);
        try {
            return view('pages.cpanel.package.form', [
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
                $cek = Package::where('name',$request->name)->first();
                $payload = [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'code' => $request->code ?? null,
                    'min_quota' => $request->min_quota,
                    'max_quota' => $request->max_quota,
                    'price' => $request->price,
                    'unit' => $request->unit,
                    'description' => $request->description,
                    'is_active' => $request->is_active,
                    'updated_by' => auth()->user()->id,
                    'updated_at' => now()
                ];
                $package = Package::find($request->id);
                $package->update($payload);
            });
            return redirect()
                ->route('cpanel.package.list')
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
                $package = Package::find($request->id);
                // dd($package);
                $package->update([
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
