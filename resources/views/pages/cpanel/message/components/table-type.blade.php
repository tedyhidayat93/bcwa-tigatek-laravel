<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Created at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
                <td>{{$types->firstItem()+$loop->index}}.</td>
                <td>
                    {{$type->name ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($type->created_at))}}
                </td>
                <td class="text-center">
                    @can('update message type')
                    <a href="{{route('cpanel.message.type.edit', $type->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete message type')
                    <a href="{{route('cpanel.message.type.delete', $type->id)}}" class="btn-delete btn btn-sm btn-danger">
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
