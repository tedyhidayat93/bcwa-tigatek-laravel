<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col" width="150">Document Number</th>
                <th scope="col">Name</th>
                <th scope="col">Program</th>
                <th scope="col">Created at</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$products->firstItem()+$loop->index}}.</td>
                <td>
                    {{$product->doc_number ?? '-'}}
                </td>
                <td>
                    <b>{{$product->name_id ?? '-'}}</b>
                    <br>
                    {{$product->name_en ?? ''}}
                </td>
                <td class="font-weight-bold">
                    {{ number_format($product->productItems->count()+$product->productaddons->count())}} Items
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($product->created_at))}}
                </td>
                <td class="text-center">
                    
                    @can('update medmaestro product')
                    <a href="{{route('cpanel.product.item.list', $product->id)}}" class="btn btn-sm btn-warning">
                        <i class="fas fa-list"></i>
                    </a>
                    @endcan
                    
                    @can('delete medmaestro product')
                    <a href="{{route('cpanel.product.delete', $product->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>