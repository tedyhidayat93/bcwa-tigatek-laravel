<div class="modal fade text-left" id="secondaryItemAddonEdit{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="secondaryItemAddonEdit{{$item->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="secondaryItemAddonEdit{{$item->id}}Label"><i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1"></i> Edit Secondary Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2 pb-4">
                <form action="{{route('cpanel.product.item.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="hidden" name="product" value="{{$product->id}}">
                <input type="hidden" name="type" value="secondary">
                <div class="row m-0">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label class="col-form-label" for="code">Code</label>
                            <input class="form-control text-sm" id="code" type="text" name="code"
                                placeholder="Judul Program" value="{{ $item->code ?? old('code')}}" disabled required>
                            @error('code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-1">
                        <div class="form-group">
                            <label class="col-form-label" for="code">Number</label>
                            <input class="form-control text-sm" id="number" type="text" name="number"
                                placeholder="Judul Program" value="{{ $item->number ?? old('number')}}" disabled required>
                            @error('number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name_id">Nama Program (ID) <small class="text-danger">(*)</small></label>
                            <input class="form-control text-sm" id="name_id" type="text" name="name_id"
                                placeholder="Judul Program" value="{{ $item->name_id ?? old('name_id')}}" required>
                            @error('name_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name_en">Program Name (EN)</label>
                            <input class="form-control text-sm" id="name_en" type="text" name="name_en"
                                placeholder="Title Program" value="{{ $item->name_en ?? old('name_en')}}">
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
                            <textarea name="description_id" class="form-control text-sm summernote" id="description_id" cols="30" rows="5">{{ $item->description_id ?? old('description_id')}}</textarea>
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

                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label class="col-form-label" for="price_type">Price Type <small class="text-danger">(*)</small></label>
                                <select name="price_type" id="price_type" class="form-select form-control">
                                    <option {{$item->price_type == 'fix' ? 'selected':''}} value="fix">Fix</option>
                                    <option {{$item->price_type == 'percentage' ? 'selected':''}} value="percentage">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 form-group">
                                <label class="col-form-label" for="price_idr">Harga (IDR) <small class="text-danger">(*)</small></label>
                                <input class="form-control text-sm price-formatter-idr" id="price_idr" type="text" name="price_idr"
                                    placeholder="" value="{{ number_format($item->price_idr, 0) ?? old('price_idr')}}" required>
                                @error('price_idr')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label" for="unit_idr">Satuan (IDR)</label>
                                <input class="form-control text-sm" id="unit_idr" type="text" name="unit_idr"
                                    placeholder="" value="{{ $item->unit_idr ?? old('unit_idr')}}">
                                @error('unit_idr')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 form-group">
                                <label class="col-form-label" for="price_usd">Price (USD)</label>
                                <input class="form-control text-sm price-formatter-usd" id="price_usd" type="text" name="price_usd"
                                    placeholder="" value="{{ number_format($item->price_usd, 0)  ?? old('price_usd')}}">
                                @error('price_usd')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label" for="unit_usd">Unit (USD)</label>
                                <input class="form-control text-sm" id="unit_usd" type="text" name="unit_usd"
                                    placeholder="" value="{{ $item->unit_usd ?? old('unit_usd')}}">
                                @error('unit_idr')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="col-md-10 offset-md-1 text-center cursor-pointer">
                            <div class="border rounded p-3 mb-2 bg-light shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image-addon-edit-{{$item->id}}" onclick="openFileManagerNewAddon('image-container-addon-edit-primary-{{$item->id}}')">
                                <input type="file" name="banner" class="d-none form-control" accept="image/*" id="file-input-addon-edit-{{$item->id}}" onchange="previewImageNewAddon(event, 'image-container-addon-edit-primary-{{$item->id}}')">
                                <div id="image-container-addon-edit-primary-{{$item->id}}">
                                    @if(!$item->banner)
                                        <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                        <h4>Upload Image</h4>
                                        <small>Click here to upload banner Product</small>
                                        <br>
                                        <small>Resolution: <b> 800 x 800 px (Square)</b></small>
                                    @else
                                        <img src="{{ asset('uploads/medmaestro/products/items/banners/normal/'.$item->banner) }}" class="img-fluid">
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
            </div>
            <div class="modal-footer bg-light d-flex align-items-center justify-content-center">
                <div class="w-100">
                    <div class="float-left">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="status" id="status-secondary-{{$item->id}}" value="active" {{$item->status == 'active' ? 'checked':'' }}>
                            <label for="status-secondary-{{$item->id}}" class="custom-control-label mt-1">Status Active ?</label>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn mx-1 btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn mx-1 btn-success"><i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>