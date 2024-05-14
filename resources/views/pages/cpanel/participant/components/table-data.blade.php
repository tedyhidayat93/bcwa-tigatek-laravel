<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">WhatsApp</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Created at</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($participants as $participant)
            <tr>
                <td>{{$participants->firstItem()+$loop->index}}.</td>
                <td>
                    {{ $participant->fullname ?? '-' }}
                </td>
                <td>
                    {{ $participant->gender ?? '-' }}
                </td>
                <td>
                    {{ $participant->email ?? '-' }}
                </td>
                <td>
                    {{ $participant->whatsapp ?? '-' }}
                </td>
                <td>
                    {{ $participant->type->name ?? '-' }}
                </td>
                <td>
                    {{ $participant->sub_category->name ?? '-' }}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($participant->created_at))}}
                </td>
                <td class="text-center">
                    @can('update participant')
                    <a href="{{route('cpanel.participant.edit', $participant->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete participant')
                    <a href="{{route('cpanel.participant.delete', $participant->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
