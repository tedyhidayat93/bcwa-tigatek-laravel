<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col">Halaman</th>
                <th scope="col">Link Halaman</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pages as $page)
            <tr>
                <td>{{$pages->firstItem()+$loop->index}}.</td>
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
                    <a href="{{route('fe.page',$page->slug)}}" target="_blank" class="text-primary">{{route('fe.page',$page->slug)}}</a>
                </td>
                <td>
                    {!!$page->is_active == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Non Aktif</span>' !!}
                </td>
                <td class="text-center">
                    <a href="{{route('cpanel.page.edit', $page->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @if(empty($page->code) && $page->is_default == 0)
                    <a href="{{route('cpanel.page.delete', $page->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endif
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
