<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col" width="600px">Banner</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($informations as $information)
            <tr>
                <td>{{$informations->firstItem()+$loop->index}}.</td>
                <td>
                    @if($information->banner)
                    <img src="{{asset('uploads/informations/thumb/'.$information->banner)}}"
                        class="img-thumbnail" style="height: 70px;">
                    @endif
                </td>
                <td>
                    {{$information->title ?? '-'}}
                </td>
                <td>
                    {!!$information->is_active == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>' !!}
                </td>
                <td class="text-center">
                    @can('update information')
                    <a href="{{route('cpanel.information.edit', $information->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete information')
                    <a href="{{route('cpanel.information.delete', $information->id)}}" class="btn btn-delete btn-sm btn-danger">
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