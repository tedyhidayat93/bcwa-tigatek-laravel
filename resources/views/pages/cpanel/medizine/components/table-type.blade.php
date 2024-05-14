<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Code</th>
                <th>Type</th>
                <th>Parent</th>
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
                    <img src="{{asset('uploads/post_types/thumb/'.$type->icon)}}"
                        class="img-thumbnail" style="height: 60px;">
                    @endif  
                </td>
                <td>
                    {{$type->code ?? '-'}}
                </td>
                <td>
                    {{$type->name ?? '-'}}
                </td>
                <td>
                    {{$type->program->name ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($type->created_at))}}
                </td>
                <td class="text-center">
                    @can('update article type')
                    <a href="{{route('cpanel.medizine.type.edit', $type->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete article type')
                    <a href="{{route('cpanel.medizine.type.delete', $type->id)}}" class="btn-delete btn btn-sm btn-danger">
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
