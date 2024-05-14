<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold">
            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
            {{$method == 'put' ? 'Edit' : 'Create'}} Participant Type
        </h6>
    </div>

    <div class="card-body">
        <form action="{{$method == 'post' ? route('cpanel.participant.type.store') : route('cpanel.participant.type.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$method == 'put' ? method_field('put') : ''}}
            <input class="form-control text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
            <div class="row">
                <div class="col-md-7 offset-md-1">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">Type Name <small class="text-danger">(*)</small></label>
                        <input class="form-control text-sm col-sm-7" id="name" type="text" name="name"
                            placeholder="Input Type Name" value="{{$data->name}}" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-7 p-0 d-flex align-items-center justify-content-end">
                            <a href="{{route('cpanel.participant.type.list')}}" class="btn btn-secondary mr-1">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
