<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Jumlah Kuota</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packages as $package)
            <tr>
                <td>{{$packages->firstItem()+$loop->index}}.</td>
                <td>
                    <b>
                        {{$package->name ?? '-'}}
                    </b>
                </td>
                <td>
                    {{number_format($package->min_quota, 0, ',', '.') . ' - ' . number_format($package->max_quota, 0, ',', '.')}}
                </td>
                <td>
                    Rp {{ number_format($package->price, 0, ',', '.') }}
                    {{ $package->unit }}
                </td>
                <td>
                    {{ $package->description }}
                </td>
                <td>
                    {!!$package->is_active == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Non Aktif</span>' !!}
                </td>
                <td class="text-center">
                    <a href="{{route('cpanel.package.edit', $package->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @if(empty($package->code) && $package->is_default == 0)
                    <a href="{{route('cpanel.package.delete', $package->id)}}" class="btn btn-delete btn-sm btn-danger">
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
