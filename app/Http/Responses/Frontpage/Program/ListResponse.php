<?php

namespace App\Http\Responses\Frontpage\Program;
use App\Models\PostCategory;
use App\Models\Program;
use Illuminate\Contracts\Support\Responsable;

class ListResponse implements Responsable
{
    public $slug_program;

    public function __construct($slug_program) {
        $this->slug_program = $slug_program;
    }

    public function toResponse($request)
    {
        try {
            $data = [];
            return view('pages.public.program.index', $data);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    private function program()
    {
        $data = Program::select('code,slug,name,icon,caption,description')
                ->where('slug',$this->slug_program)
                ->first();
        return $data;
    }
}
