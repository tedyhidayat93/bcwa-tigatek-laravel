<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover/Icon</th>
                <th>Type</th>
                <th>Code</th>
                <th>Program</th>
                <th>Created at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
                <td>{{$types->firstItem()+$loop->index}}.</td>
                <td>
                    @if($type->icon)
                    <img src="{{asset('uploads/programs/types/icons/thumb/'.$type->icon)}}"
                        class="img-thumbnail" style="height: 60px;">
                    @endif
                </td>
                <td>
                    {{$type->name ?? '-'}}
                </td>
                <td>
                    {{$type->code ?? '-'}}
                </td>
                <td>
                    {{$type->program->name ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($type->created_at))}}
                </td>
                <td class="text-center">
                    @can('update program type')
                    <a href="{{route('cpanel.program.type.edit', $type->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete program type')
                    <a href="{{route('cpanel.program.type.delete', $type->id)}}" class="btn-delete btn btn-sm btn-danger">
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
