<div class="modal fade" id="productForm" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="productFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="productFormLabel"><i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1"></i> Create New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5 pb-4">
                <form action="{{route('cpanel.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-0">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label text-md-right pr-4">Select Program <span class="text-danger">(*)</span></label>
                                <select name="type" id="type" class="form-control select2bs4" required data-placeholder="Select Program">
                                    <option disabled selected></option>
                                    @foreach ($types as $type)
                                        <option data-type="{{$type->code}}" value="{{$type->id}}">[{{$type->code}}] {{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label class="col-form-label text-md-right pr-4">Code</label>
                                <input class="form-control text-sm" id="code" type="text" name="code"
                                    placeholder="" value="{{old('code')}}" required>
                                @error('code')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name_id">Nama Produk (ID) <small class="text-danger">(*)</small></label>
                                <input class="form-control text-sm" id="name_id" type="text" name="name_id"
                                    placeholder="Judul Produk" value="{{old('name_id')}}" required>
                                @error('name_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label" for="name_en">Product Name (EN)</label>
                                <input class="form-control text-sm" id="name_en" type="text" name="name_en"
                                    placeholder="Title Product" value="{{old('name_en')}}">
                                @error('name_en')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="col-form-label" for="description_id">Description</label>
                                <textarea name="description_id" class="form-control summernote text-sm" id="description_id" cols="30" rows="5">{{old('description_id')}}</textarea>
                                @error('description_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-md-12 text-center cursor-pointer">
                            <div class="border rounded p-3 mb-2 bg-light shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image" onclick="openFileManager()">
                                <input type="file" name="banner" class="d-none form-control" accept="image/*" id="file-input" onchange="previewImage(event)">
                                <div id="image-container">
                                    <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                    <h4>Upload Image</h4>
                                    <small>Click here to upload banner Product</small>
                                    <br>
                                    <small>Resolution: <b> 800 x 800 px (Square)</b></small>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            <div class="modal-footer">
                <div class="w-100 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn mx-1 btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn mx-1 btn-success">Save & Next</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $('select[name=type]#type').change(function(){
        var code = $(this).find('option:selected').data('type');
        $('input[name=code]#code').val(code);

    });
</script>
<script>
    function openFileManager() {
        document.getElementById('file-input').click();
    }
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var box = document.getElementById('box-image');
            var imageContainer = document.getElementById('image-container');
            // var hintBoxImage = document.getElementById('text-image-hint');
            // Menghapus gambar yang ada sebelumnya
            while (imageContainer.firstChild) {
                imageContainer.removeChild(imageContainer.firstChild);
            }
            // Menambahkan gambar yang baru dipilih
            var img = document.createElement('img');
            img.classList.add('img-fluid');
            img.classList.add('rounded');
            img.style.width = '60%';
            img.src = dataURL;
            imageContainer.appendChild(img);
            
            // Sembunyikan gambar yang dipilih
            imageContainer.style.display = 'block';
            input.style.display = 'none';
            
            // Tampilkan tombol change image
            // hintBoxImage.classList.remove('d-none');
            // hintBoxImage.classList.add('d-block');
        };
        reader.readAsDataURL(input.files[0]);
    }
    
</script>
@endsection