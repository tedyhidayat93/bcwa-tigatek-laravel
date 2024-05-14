<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col" width="100px"></th>
                <th scope="col">Name</th>
                <th scope="col">Short Bio</th>
                <th scope="col">Created at</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mentors as $mentor)
            <tr>
                <td>{{$mentors->firstItem()+$loop->index}}.</td>
                <td>    
                    @if($mentor->avatar)
                    <img src="{{asset('uploads/mentors/thumb/'.$mentor->avatar)}}"
                        class="img-thumbnail" style="height: 70px;">
                    @endif  
                </td>
                <td>
                    {{$mentor->name ?? '-'}}
                </td>
                <td>
                    {{$mentor->short_bio ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($mentor->created_at))}}
                </td>
                <td class="text-center">
                    @can('update mentor')
                    <a href="{{route('cpanel.mentor.edit', $mentor->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete mentor')
                    <a href="{{route('cpanel.mentor.delete', $mentor->id)}}" class="btn btn-delete btn-sm btn-danger">
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