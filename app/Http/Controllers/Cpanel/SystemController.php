<?php

namespace App\Http\Controllers\Cpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\ConfigVariable;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = ConfigVariable::select('*');
            $data = $data->where('group', $request->group);
            $data = $data->where('is_active', 1);
            $data = $data->get();

            return view('pages.cpanel.configurations.system.index', [
                'configs' => $data,
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }


    public function update(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if ($request->form_type == 'file') {
                    $value = $this->upload_image($request);
                } elseif ($request->form_type == 'file-non-image') {
                    $value = $this->upload_file($request);
                } else {
                    $value = $request->value;
                }
            
                $system = ConfigVariable::find($request->id);

                $system->update([
                    'value' => $value,
                    'updated_at' => now()
                ]);
            });
            return redirect()
                ->back()
                ->with('success', 'successfully updated configuration.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function upload_image($request)
    {
        $file_name = null;
        $path = 'assets/settings/';
        $file_name = Helper::uploadImage($request->value, $path, 'only_normal_size');
        return $file_name;
    }

    private function upload_file($request)
    {
        $path = 'assets/settings/attachment/';
        $file_name = Helper::uploadFile($request->value, $path);
        return $file_name;
    }
}
