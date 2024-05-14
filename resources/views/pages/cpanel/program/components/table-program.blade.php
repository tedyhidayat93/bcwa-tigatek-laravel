<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th width="140px">Cover/Icon</th>
                <th>Program</th>
                <th>Code</th>
                <th>Created at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($programs as $program)
            <tr>
                <td width="50">{{$programs->firstItem()+$loop->index}}.</td>
                <td>
                    @if($program->icon)
                    <img src="{{asset('uploads/programs/icons/thumb/'.$program->icon)}}"
                        class="img-thumbnail" style="height: 60px;">
                    @endif
                </td>
                <td>
                    {{$program->name ?? '-'}}
                </td>
                <td>
                    {{$program->code ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($program->created_at))}}
                </td>
                <td class="text-center">
                    @can('update program type')
                    <a href="{{route('cpanel.program.edit', $program->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete program type')
                    <a href="{{route('cpanel.program.delete', $program->id)}}"
                        class="btn-delete btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
