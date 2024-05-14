<div class="modal fade text-left" id="productFormEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="productFormEdit{{$product->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="productFormEdit{{$product->id}}Label"><i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1"></i> Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5 pb-4">
                <form action="{{route('cpanel.product.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="row m-0">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="col-form-label text-md-right pr-4">Select Type <span class="text-danger">(*)</span></label>
                                <select name="type" id="typeEdit{{$product->id}}" class="form-control select2bs4" required data-placeholder="Select Type" disabled>
                                    <option disabled selected></option>
                                    @foreach ($types as $type)
                                        <option {{$product->type_id == $type->id ? 'selected':''}} data-type="{{$type->code}}" value="{{$type->id}}">[{{$type->code}}] {{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label class="col-form-label text-md-right pr-4">Code</label>
                                <input class="form-control text-sm" id="code" type="text" name="code"
                                    placeholder="" value="{{ $product->code ?? old('code')}}" required disabled>
                                @error('code')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label class="col-form-label text-md-right pr-4">Document Number</label>
                                <input class="form-control text-sm" id="doc_number" type="text" name="doc_number"
                                    placeholder="" value="{{ $product->doc_number ?? old('doc_number')}}" required disabled>
                                @error('doc_number')
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
                                    placeholder="Judul Produk" value="{{ $product->name_id ?? old('name_id')}}" required>
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
                                    placeholder="Title Product" value="{{ $product->name_en ?? old('name_en')}}">
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
                                <textarea name="description_id" class="form-control summernote text-sm" id="description_id" cols="30" rows="5">{{ $product->description_id ?? old('description_id')}}</textarea>
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
                            <div class="border rounded p-3 mb-2 bg-light shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image-edit" onclick="openFileManagerEdit()" style="min-height:300px;">
                                <input type="file" name="banner" class="d-none form-control" accept="image/*" id="file-input-edit" onchange="previewImageEdit(event)">
                                <div id="image-container-edit">
                                    @if(!$product->banner)
                                        <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                        <h4>Upload Image</h4>
                                        <small>Click here to upload banner Product</small>
                                        <br>
                                        <small>Resolution: <b> 800 x 800 px (Square)</b></small>
                                    @else
                                        <img src="{{ asset('uploads/medmaestro/products/banners/normal/'.$product->banner) }}" class="img-fluid">
                                        <br>
                                        <small>Click here to upload new banner Product</small>
                                        <br>
                                        <small>Resolution: <b> 800 x 800 px (Square)</b></small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            <div class="modal-footer">
                <div class="w-100 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn mx-1 btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn mx-1 btn-success"><i class="fas fa-save"></i> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>