
<div class="dropdown">
    <button class="btn btn-success btn-block btn-lg mb-3 btn-gradient" type="button" data-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-plus"></i> Add New Program
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item font-weight-bold" data-toggle="modal" data-target="#primaryItem" href="#"><i
                class="fas mr-2 fa-plus p-1 rounded bg-teal"></i> Primary Program</a>
        <a class="dropdown-item font-weight-bold" data-toggle="modal" data-target="#secondaryItem"
            href="#"><i class="fas mr-2 fa-plus p-1 rounded bg-secondary"></i> Secondary Program</a>
    </div>
</div>

<div class="card">
    <div class="card-body box-profile">
        <div class="d-flex justify-content-center mb-2">
            <div class="rounded w-50 text-center bg-warning py-1 px-2">
                <h1 class="m-0">
                    {{$product->code}}
                </h1>
                <span class="font-weight-bold">
                    #{{$product->doc_number}}
                </span>
            </div>
        </div>
        <h6 class="text-center mb-0">{{$product->name_id}}</h6>
        <p class="text-center mb-0">{{$product->name_en}}</p>
        <ul class="list-group list-group-unbordered mb-3 mt-3">
            <li class="list-group-item">
                <b>Primary Programs</b> <a class="float-right text-success font-weight-bold">{{count($main_items)}}</a>
            </li>
            <li class="list-group-item">
                <b>Secondary Programs</b> <a class="float-right text-success font-weight-bold">{{count($secondary_items)}}</a>
            </li>
        </ul>
        @if($product->banner)
        <b>Cover Thumbnail</b>
        <img src="{{ asset('uploads/medmaestro/products/banners/normal/'.$product->banner) }}" class="img-fluid mt-2 img-thumbnail">
        <hr>
        @endif
        
        <div class="d-flex align-items-end" style="gap:6px;">
            @can('update medmaestro product')
            <a href="#" data-toggle="modal" data-target="#productFormEdit" class="btn btn-outline-secondary btn-sm btn-block"><b><i class="fas fa-pen fa-fw"></i> Edit</b></a>
            @endcan
            
            @can('delete medmaestro product')
            <a href="{{route('cpanel.product.delete', $product->id)}}" class="btn btn-delete btn-sm btn-outline-danger btn-block">
                <i class="fas fa-trash"></i> Delete
            </a>
            @endcan
        </div>
    </div>

</div>
