<div class="card-header" style="background-color: #cdfff1;">
    <h6 class="m-0 text-dark text-uppercase"><i class="fas fa-cubes p-1 mr-2 text-white bg-success rounded"></i> Primary Programs</h6>
</div>
<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px" class="bg-teal">#</th>
                <th scope="col" width="90" class="bg-teal">Code</th>
                <th scope="col" width="30" class="bg-teal">Number</th>
                <th scope="col" class="bg-teal">Name</th>
                <th scope="col" width="150" class="bg-teal">Price</th>
                {{-- <th scope="col" class="bg-teal">Description</th> --}}
                {{-- <th scope="col" width="100">Created At</th> --}}
                <th scope="col" width="60" class="bg-teal">Status</th>
                <th scope="col" width="150px" class="text-center bg-teal">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($main_items as $item)
            <tr>
                <td>{{$main_items->firstItem()+$loop->index}}.</td>
                <td>
                    {{$item->code ?? '-'}}
                </td>
                <td>
                    {{$item->number ?? '-'}}
                </td>
                <td>
                    <b>{{$item->name_id ?? '-'}}</b>
                    <br>
                    {{$item->name_en ?? ''}}
                </td>
                <td>
                    <b>
                        Rp. {{ number_format($item->price_idr, 0, ',', '.') }} (IDR)
                    </b>
                    @if(!empty($item->price_usd))
                    <br>
                    $ {{ number_format($item->price_usd, 0) }} (USD)
                    @endif
                </td>
                {{-- <td>
                    {!! strip_tags( $item->description_id)!!}
                </td> --}}
                {{-- <td>
                    {{ date('d/m/Y', strtotime($item->created_at))}}
                </td> --}}
                <td>
                    {!! $item->status == 'active' ? '<span class="badge bg-success">Active</span>':'<span class="badge bg-secondary">Inactive</span>' !!}
                </td>
                <td class="text-center">
                    @can('update medmaestro product')
                    <a href="#" data-toggle="modal" data-target="#primaryItemPrimaryEdit{{$item->id}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @include('pages.cpanel.medmaestro.product.components.modal-edit-primary-item')
                    
                    @endcan

                    @can('delete medmaestro product')
                    <a href="{{route('cpanel.product.item.delete', [$item->id, 'type' => 'primary'])}}" data-delete-title="Item {{$item->name_id}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>