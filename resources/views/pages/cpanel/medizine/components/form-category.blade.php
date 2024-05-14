<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Create'}} Medizine Category
        </h6>
    </div>

    <div class="card-body">
            <form action="{{$method == 'post' ? route('cpanel.medizine.category.store') : route('cpanel.medizine.category.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{$method == 'put' ? method_field('put') : ''}}
                <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
                <div class="row">
                    <div class="col-md-7 offset-md-1">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4">Type <small class="text-danger">(*)</small></label>
                            <div class="col-sm-7 p-0">
                                <select name="type" class="form-control select2bs4" data-placeholder="Select Type" required>
                                    <option disabled selected></option>
                                    @foreach ($types as $type)
                                        <option {{$type->id == $data->post_category_id ? 'selected':''}} value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Category Name <small class="text-danger">(*)</small></label>
                            <input class="form-control text-sm col-sm-7" id="name" type="text" name="name"
                                placeholder="Input Type Name" value="{{$data->name}}" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4" for="code">Code</label>
                            <input class="form-control text-sm col-sm-7" id="code" type="text" name="code"
                                placeholder="Optional" value="{{$data->code}}">
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4" for="caption">Caption</label>
                            <textarea class="form-control text-sm col-sm-7" id="caption" type="text" name="caption"
                                placeholder="Optional">{{$data->caption}}</textarea>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4" for="description">Description</label>
                            <textarea class="form-control text-sm col-sm-7" rows="15" id="description" type="text" name="description"
                                placeholder="Optional">{{$data->description}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label text-md-right pr-4" for="icon">Upload Cover/Icon</label>
                            <div class="col-sm-7 p-0">
                                <input class="form-control text-sm" accept="image/*" id="icon" type="file" name="icon"
                                    placeholder="Optional" value="{{$data->icon}}">
                                <small>Resolution: <b> 1.215 x 660 px (Landscape)</b></small>        
                                @if($method == 'put' && $data->icon)
                                <br>
                                <img src="{{asset('uploads/post_categories/thumb/'.$data->icon)}}"
                                    class="img-fluid w-50 img-thumbnail mt-2">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                                <a href="{{route('cpanel.medizine.category.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
