<div class="card shadow-sm">
    <div class="card-header bg-custom-1">
        <div class="row">
            <div class="col-md-6 d-flex flex-wrap justify-content-md-start align-items-md-center">
                <h6 class="m-0">
                    <i class="fas fa-images"></i> 
                    Homepage Sliders
                </h6>
            </div>
            <div class="col-md-6 d-flex flex-wrap justify-content-md-end align-items-md-center">
                <a href="#" class="btn btn-success btn-sm"  data-bs-toggle="modal"
                data-bs-target="#modalCreate"><i class="fas fa-plus"></i> Add Slider</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Banner Slider</th>
                    <th>Title & Subtitle</th>
                    <th>URL Link</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                @php
                    $i=1;
                @endphp
                @forelse ($sliders as $slider)
                <tr>
                    <td>{{$i++}}.</td>
                    <td>    
                        @if($slider->banner)
                        <img src="{{asset('uploads/sliders/thumb/'.$slider->banner)}}"
                            class="img-thumbnail" style="height: 70px;">
                        @endif  
                    </td>
                    <td>
                        <b>{{$slider->title}}</b>
                        <br>
                        <small>
                            {{$slider->subtitle}}
                        </small>
                    </td>
                    <td>
                        {{$slider->url}}
                    </td>
                    <td>
                        {!!$slider->status == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>' !!}
                    </td>
                    <td>
                        <a href="{{route('cpanel.settings.ui.slider.delete', $slider->id)}}" class="btn btn-delete btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#modal{{$slider->id}}">
                            <i class="fas fa-pen"></i>
                        </button>
                        @include('pages.cpanel.configurations.ui.components.slider.modal-edit', ['slider' => $slider])
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="6" class="py-5 text-center">
                        <h4>No Data Available</h4>
                        <a href="#" class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#modalCreate"><i class="fas fa-plus"></i> Add New Slider</a>
                    </th>
                </tr>
                @endforelse
        </table>
    </div>
</div>
