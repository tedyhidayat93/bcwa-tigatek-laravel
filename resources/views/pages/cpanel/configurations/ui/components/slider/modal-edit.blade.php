<div class="modal fade" id="modal{{$slider->id}}" tabindex="-1" aria-labelledby="modal{{$slider->id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-2 bg-custom-1 d-flex align-items-center">
                <h6 class="mb-0" id="modal{{$slider->id}}">Edit Value</h6>
                <button type="button" data-bs-dismiss="modal" class="btn" aria-label="Close"><i
                        class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('cpanel.settings.ui.slider.update') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body text-start">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $slider->id; }}">

                    <div class="row">
                        <div class="px-md-3 col-md-8 offset-md-1">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right pr-4" for="title">Title</label>
                                <input class="form-control text-sm col-sm-8" id="title" type="text" name="title"
                                    placeholder="Optional" value="{{old('title', $slider->title)}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right pr-4" for="description">Sub Title</label>
                                <textarea class="form-control text-sm col-sm-8" id="subtitle" type="text" rows="5" name="subtitle"
                                    placeholder="Optional">{{old('subtitle', $slider->subtitle)}}</textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right pr-4" for="url">Link Url</label>
                                <input class="form-control text-sm col-sm-8" id="url" type="text" name="url"
                                    placeholder="Optional" value="{{old('url', $slider->url)}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right pr-4" for="button_text">Button Text</label>
                                <input class="form-control text-sm col-sm-8" id="button_text" type="text" name="button_text"
                                    placeholder="Optional" value="{{old('button_text', $slider->button_text)}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-md-right pr-4" for="banner">Upload Banner <small class="text-danger">*</small></label>
                                <div class="col-sm-8 p-0">
                                    <input class="form-control text-sm" accept="image/*" id="avatar" type="file" name="banner"
                                        placeholder="Optional">
                                    <small>Resolution: <b> 1280 x 720 px (Landscape)</b></small>
                                    @if(!empty($slider->banner))
                                    <img src="{{asset('uploads/sliders/thumb/'.$slider->banner)}}"
                                        class="img-fluid w-100 img-thumbnail mt-2">
                                    @endif
                                </div>
                            </div>
        
                            <div class="row mt-5">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8 p-0 d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                    &nbsp;
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>