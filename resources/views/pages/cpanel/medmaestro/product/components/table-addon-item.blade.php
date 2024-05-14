<div class="card-header bg-secondary">
    <h6 class="m-0 text-white text-uppercase"><i class="fas fa-cubes p-1 mr-2 text-white bg-dark rounded"></i> Secondary Programs</h6>
</div>
<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" class="bg-dark" width="70px">#</th>
                <th scope="col" class="bg-dark" width="90">Code</th>
                <th scope="col" class="bg-dark" width="30">Number</th>
                <th scope="col" class="bg-dark">Name</th>
                <th scope="col" class="bg-dark" width="150">Price</th>
                {{-- <th scope="col" class="bg-dark">Description</th> --}}
                {{-- <th scope="col" class="bg-dark" width="100">Created At</th> --}}
                <th scope="col" class="bg-dark" width="60">Status</th>
                <th scope="col" class="bg-dark" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($secondary_items as $item)
            <tr>
                <td>{{$secondary_items->firstItem()+$loop->index}}.</td>
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
                    @if($item->price_type == 'percentage')
                        <b>
                            + {{ number_format($item->price_idr, 0) }} % (IDR)
                        </b>
                        @if(!empty($item->price_usd))
                        <br>
                        + {{ number_format($item->price_usd, 0) }} % (USD)
                        @endif
                    @else
                        <b>
                            Rp. {{ number_format($item->price_idr, 0, ',', '.') }} (IDR)
                        </b>
                        @if(!empty($item->price_usd))
                        <br>
                        $ {{ number_format($item->price_usd, 0) }} (USD)
                        @endif
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
                    <a href="#" data-toggle="modal" data-target="#secondaryItemAddonEdit{{$item->id}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @include('pages.cpanel.medmaestro.product.components.modal-edit-secondary-item')
                    @endcan

                    @can('delete medmaestro product')
                    <a href="{{route('cpanel.product.item.delete', [$item->id, 'type' => 'secondary'] )}}" data-delete-title="Item {{$item->name_id}}" class="btn btn-delete btn-sm btn-danger">
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