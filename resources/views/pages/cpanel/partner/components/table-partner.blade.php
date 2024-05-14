<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col" width="100px"></th>
                <th scope="col">Name</th>
                <th scope="col">Ref Code</th>
                <th scope="col">Events Total</th>
                <th scope="col">Users Total</th>
                <th scope="col">Created at</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($partners as $partner)
            <tr>
                <td>{{$partners->firstItem()+$loop->index}}.</td>
                <td>
                    @if($partner->logo)
                    <img src="{{asset('uploads/partners/thumb/'.$partner->logo)}}"
                        class="img-thumbnail" style="height: 40px;">
                    @endif
                </td>
                <td>
                    {{$partner->name ?? '-'}}
                </td>
                <td>
                    {{$partner->code ?? '-'}}
                </td>
                <td class="text-md font-weight-bold">
                    {{ number_format(0)}} Event
                </td>
                <td class="text-md font-weight-bold">
                    {{ number_format($partner->users->count())}} User
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($partner->created_at))}}
                </td>
                <td class="text-center">
                    @can('update partners')
                    <a href="{{url('cpanel/user-management/users/create?partner='. $partner->id)}}" class="btn btn-sm btn-success">
                        <i class="fas fa-user-plus"></i>
                    </a>
                    <a href="{{route('cpanel.partner.edit', $partner->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete partners')
                    <a href="{{route('cpanel.partner.delete', $partner->id)}}" class="btn btn-delete btn-sm btn-danger">
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