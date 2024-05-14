<div class="card mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Create New'}} Partner
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.partner.store') : route('cpanel.partner.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="px-md-3 {{$method != 'put' ? 'col-md-6 offset-md-2' : 'col-md-4'}}">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Partner Name <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="name" type="text" name="name"
                            placeholder="Input name" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="code">Code</label>
                        <input class="form-control text-sm col-sm-7" id="code" type="text" name="code"
                            placeholder="Optional" value="{{$data->code}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="url_link">Website</label>
                        <input class="form-control text-sm col-sm-7" id="url_link" type="text" name="url_link"
                            placeholder="Optional" value="{{$data->url_link}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="description">Description</label>
                        <textarea class="form-control text-sm col-sm-7" id="description" type="text" rows="5" name="description"
                            placeholder="Optional">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="logo">Upload Logo</label>
                        <div class="col-sm-7 p-0">
                            <input class="form-control text-sm" accept="image/*" id="logo" type="file" name="logo"
                                placeholder="Optional" value="{{$data->logo}}">
                            @if($method == 'put' && $data->logo)
                            <img src="{{asset('uploads/partners/thumb/'.$data->logo)}}"
                                class="img-fluid w-50 img-thumbnail mt-2">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.partner.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
                
                @if($method == 'put')
                <div class="col-12 col-md-8 pl-md-3">
                    @include('pages.cpanel.partner.components.users')
                </div>
                @endif
            </div>
        </form>
    </div>
</div>
