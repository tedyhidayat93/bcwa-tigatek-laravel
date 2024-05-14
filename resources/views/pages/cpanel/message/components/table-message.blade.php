<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th width="240px">From</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Received At</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $message)
            <tr>
                <td width="50">{{$messages->firstItem()+$loop->index}}.</td>
                <td>
                    <b>
                        {{$message->name ?? '-'}}
                    </b>
                    <br>
                    - {{$message->email ?? '-'}}
                    <br>
                    - {{$message->phone ?? '-'}}
                </td>
                <td>
                    {{$message->type_id ? $message->type->name : $message->more_subject}}
                </td>
                <td>
                    {{$message->message}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($message->created_at))}}
                </td>
                <td class="text-center">
                    {{-- @can('update message type')
                    <a href="{{route('cpanel.message.edit', $message->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan --}}
                    @can('delete message type')
                    <a href="{{route('cpanel.message.delete', $message->id)}}"
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
