<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($partners as $page)
            <tr>
                <td>{{$partners->firstItem()+$loop->index}}.</td>
                <td>
                    <b>
                        {{$page->name ?? '-'}}
                    </b>
                    <br>
                    <small class="text-secondary">
                        <b>
                            {{$page->code ?? ''}}
                        </b>
                    </small>
                </td>
                <td>
                    <a href="{{route('fe.page',$page->slug)}}" target="_blank" class="text-primary"><i class="fas fa-eye fa-fw"></i> Preview</a>
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($page->created_at))}}
                </td>
                <td>
                    {!!$page->is_active == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>' !!}
                </td>
                <td class="text-center">
                    @can('update partners')
                    <a href="{{route('cpanel.page.edit', $page->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete partners')
                        @if(empty($page->code) && $page->is_default == 0)
                        <a href="{{route('cpanel.page.delete', $page->id)}}" class="btn btn-delete btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endif
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
