{{-- <div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Create'}} Participant Category
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.participant.category.store') : route('cpanel.participant.category.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="col-md-7 offset-md-1">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Category Name <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="name" type="text" name="name"
                            placeholder="Input Category Name" value="{{$data->name}}" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.participant.category.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> --}}

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Create'}} Participant Category
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.participant.category.store') : route('cpanel.participant.category.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="col-md-7 offset-md-1">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Category Name <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="name" type="text" name="name" placeholder="Input Category Name" value="{{$data->name}}" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-7 p-0">
                            <hr>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="subcategory">Sub Category</label>
                        <div class="col-sm-7 p-0">
                            <div id="subcategory-container">
                                @if($method == 'put')
                                    @foreach($data->sub_categories as $subcategory)
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Edit
                                                </span>
                                            </div>
                                            <input type="hidden" class="form-control" name="subcategoryid[]" value="{{ $subcategory->id }}">
                                            <input type="text" class="form-control subcategory-input" name="subcategory[]" placeholder="Sub Category Name" value="{{ $subcategory->name }}" required>
                                            <div class="input-group-append">
                                                <a href="{{route('cpanel.participant.category.delete-subcategory', $subcategory->id)}}" class="btn-delete btn btn-danger" type="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-block btn-outline-success mt-2" id="add-subcategory"><i class="fas fa-plus"></i> Add Sub Category</button>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.participant.category.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Template untuk subkategori -->
<script id="subcategory-template" type="text/html">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">
                New
            </span>
        </div>
        <input type="text" class="form-control subcategory-input" name="subcategory[]" placeholder=" New Sub Category Name" required>
        <div class="input-group-append">
            <button class="btn btn-danger remove-subcategory" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </div>
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Menambahkan subkategori
        $('#add-subcategory').click(function() {
            var template = $('#subcategory-template').html();
            $('#subcategory-container').append(template);
        });

        // Menghapus subkategori
        $(document).on('click', '.remove-subcategory', function() {
            $(this).closest('.input-group').remove();
        });
    });
</script>
