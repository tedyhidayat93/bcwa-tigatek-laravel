<div class="card mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Add New'}} Information
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.information.store') : route('cpanel.information.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="px-md-3 col-md-7 offset-md-1">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="title">Title <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="title" type="text" name="title"
                            placeholder="Input Title" value="{{old('title',$data->title)}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="description">Description</label>
                        <textarea class="form-control text-sm col-sm-7" id="description" type="text" rows="5" name="description"
                            placeholder="Optional">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="banner">Upload Banner Image</label>
                        <div class="col-sm-7 p-0">
                            <input class="form-control text-sm" accept="image/*" id="banner" type="file" name="banner"
                                placeholder="Optional" value="{{$data->banner}}">
                            <small>Resolution: <b> 1300 x 100 px (Landscape)</b></small>
                            @if($method == 'put' && $data->banner)
                            <br>
                            <img src="{{asset('uploads/informations/thumb/'.$data->banner)}}"
                                class="img-fluid w-100 img-thumbnail mt-2">
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="url">Url Link</label>
                        <input class="form-control text-sm col-sm-7" id="url" type="text" name="url"
                            placeholder="Input Url" value="{{ old('url', $data->url) }}" required>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="is_active">Status <small class="text-danger">(*)</small></label>
                        <select name="is_active" id="is_active" class="form-control form-select text-sm col-sm-7">
                            <option {{$data->is_active == config('constants.active_status') ? 'selected':''}} value="{{config('constants.active_status')}}">Active</option>
                            <option {{$data->is_active == config('constants.inactive_status') ? 'selected':''}} value="{{config('constants.inactive_status')}}">Inactive</option>
                        </select>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.information.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
