@extends('layouts.app')

@section('content')
@include('pages.cpanel.user_management.components._header-user')
<section class="content mt-3">
    <div class="container-fluid">
        @include('layouts.components.app.alerts')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">
                            <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                            {{$method == 'put' ? 'Edit' : 'Add'}} Participant
                        </h6>
                    </div>
    
                    <div class="card-body">
                        <form action="{{$method == 'post' ? url('cpanel/participant/store') : url('cpanel/participant/update/') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{$method == 'put' ? method_field('put') : ''}}
                            <input class="form-control form-control-sm text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-12 col-sm-7">
                                            <h6 class="text-teal font-weight-bold">Detail Profile</h6>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="name">First Name <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="name" type="text" name="name"
                                                placeholder="First Name" value="{{old('name', $data->name)}}" required>
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="lastname">Last Name</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="lastname" type="text" name="lastname"
                                                placeholder="Last Name" value="{{old('lastname', $data->lastname)}}">
                                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="fullname">Full name & title</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="fullname" type="text" name="fullname"
                                                placeholder="Ex: Prof. Lorem Ipsum M.Kom" value="{{old('fullname', $data->fullname)}}">
                                            @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="birthdate">Birthdate</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="birthdate" type="date" name="birthdate" value="{{old('birthdate', $data->birthdate ? date('Y-m-d',strtotime($data->birthdate)):'')}}">
                                            @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4">Gender</label>
                                        <div class="col-md-6">
                                            <select name="gender" class="form-control form-control-sm form-select">
                                                <option value="" selected disabled>Select Gender</option>
                                                <option {{$data->gender == 'male' ? 'selected':''}} value="male">Male</option>
                                                <option {{$data->gender == 'female' ? 'selected':''}} value="female">Female</option>
                                            </select>
                                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="address">Address</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control form-control-sm text-sm" rows="2" id="address" type="text" name="address"
                                                placeholder="Optional">{{old('address', $data->address)}}</textarea>
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="short_bio">Short Bio</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control form-control-sm text-sm" rows="2" id="short_bio" type="text" name="short_bio"
                                                placeholder="Optional">{{old('short_bio', $data->short_bio)}}</textarea>
                                            @error('short_bio') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4">Type</label>
                                        <div class="col-md-6">
                                            <select name="type" id="type" class="form-select form-select-sm select2bs4"
                                                data-placeholder="Select type">
                                                <option disabled selected></option>
                                                @foreach ($types as $type)
                                                <option {{$type->id == $data->participant_type_id ? 'selected':''}}
                                                    value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @can('create participant type')
                                            <a href="{{route('cpanel.participant.type.create')}}" class="text-success">
                                                <small>
                                                    <i class="fas fa-plus"></i> Add New Type
                                                </small>
                                            </a>
                                            @endcan
                                            @error('type')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4">Category</label>
                                        <div class="col-md-6">
                                            <select name="category" id="category" class="form-select form-select-sm select2bs4"
                                                data-placeholder="Select Category">
                                                <option disabled selected></option>
                                                @foreach ($categories as $category)
                                                <option {{$category->id == $data->participant_category_id ? 'selected':''}}
                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @can('create participant category')
                                            <a href="{{route('cpanel.participant.category.create')}}" class="text-success">
                                                <small>
                                                    <i class="fas fa-plus"></i> Add New Category
                                                </small>
                                            </a>
                                            @endcan
                                            @error('category')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4">Sub Category</label>
                                        <div class="col-md-6">
                                            <select name="sub_category" id="sub_category" class="form-control select2bs4"
                                                data-placeholder="Select Sub Category">
                                                <option disabled selected></option>
                                                @if($method == 'put')
                                                @foreach ($sub_categories as $sub_category)
                                                <option {{$sub_category->id == $data->participant_sub_category_id ? 'selected':''}}
                                                    value="{{$sub_category->id}}">
                                                    {{$sub_category->name}}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @can('create article category')
                                            @if($data->participant_category_id)
                                            <a href="{{route('cpanel.participant.category.edit',$data->participant_category_id)}}" class="text-success">
                                                <small>
                                                    <i class="fas fa-plus"></i> Add New Sub Category
                                                </small>
                                            </a>
                                            @endif
                                            @endcan
                                            @error('sub_category')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-12 col-sm-7">
                                            <h6 class="text-teal font-weight-bold">Contact & Social Media</h6>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="email">Email <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="email" type="email" name="email" placeholder="mail@mail.com"
                                                value="{{old('email', $data->email)}}" {{$method == 'put' && !auth()->user()->hasRole('super-admin')  ? 'disabled' : ''}} required>
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="whatsapp">WhatsApp <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="whatsapp" type="text" name="whatsapp" placeholder="0812xxxxxxxx"
                                                value="{{old('whatsapp', $data->whatsapp)}}" required>
                                            @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="linkedin">Linked In</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="linkedin" type="text" name="linkedin" placeholder="linkedin.com/in/your-account"
                                                value="{{old('linkedin', $data->linkedin)}}">
                                            @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="instagram">Instagram</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="instagram" type="text" name="instagram" placeholder="instagram.com/your-username"
                                                value="{{old('instagram', $data->instagram)}}">
                                            @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="facebook">Facebook</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="facebook" type="text" name="facebook" placeholder="facebook.com/your-username"
                                                value="{{old('facebook', $data->facebook)}}">
                                            @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="twitter">Twitter</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="twitter" type="text" name="twitter" placeholder="twitter.com/your-username"
                                                value="{{old('twitter', $data->twitter)}}">
                                            @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="tiktok">Tiktok</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="tiktok" type="text" name="tiktok" placeholder="tiktok.com/your-username"
                                                value="{{old('tiktok', $data->tiktok)}}">
                                            @error('tiktok') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-4 col-form-label text-md-right pr-4" for="youtube">Youtube</label>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-sm text-sm" id="youtube" type="text" name="youtube" placeholder="youtube.com/your-username"
                                                value="{{old('youtube', $data->youtube)}}">
                                            @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-10 offset-md-1 text-center cursor-pointer">
                                    <hr class="my-5">
                                    <div class="border rounded p-3 mb-2 bg-light shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image" onclick="openFileManager()">
                                        <input type="file" name="avatar" class="d-none form-control" accept="image/*" id="file-input" onchange="previewImage(event)">
                                        <div id="image-container">
                                            @if($data->avatar)
                                                <img src="{{asset('uploads/participants/thumb/'.$data->avatar)}}" class="img-fluid">
                                            @else
                                                <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                                <h4>Upload Photo</h4>
                                                <small>Click here to upload your photo</small>
                                            @endif
                                            <br>
                                            <small>Resolution: <b> 800 x 800 px (Square)</b></small>

                                        </div>
                                    </div>
                                    <small class="text-info {{$method == 'put' ? '' : 'd-none'}}" id="text-image-hint">*) If you want to change the image, click the box above.</small>
                                </div>
                            </div>
                            <div class="row bg-light p-3 mt-4">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <a href="{{url('cpanel/participant/list')}}" class="btn btn-secondary mr-1">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
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
            var hintBoxImage = document.getElementById('text-image-hint');
            // Menghapus gambar yang ada sebelumnya
            while (imageContainer.firstChild) {
                imageContainer.removeChild(imageContainer.firstChild);
            }
            // Menambahkan gambar yang baru dipilih
            var img = document.createElement('img');
            img.classList.add('img-fluid');
            img.classList.add('rounded');
            img.style.width = '30%';
            img.src = dataURL;
            imageContainer.appendChild(img);
            
            // Sembunyikan gambar yang dipilih
            imageContainer.style.display = 'block';
            input.style.display = 'none';
            
            // Tampilkan tombol change image
            hintBoxImage.classList.remove('d-none');
            hintBoxImage.classList.add('d-block');
        };
        reader.readAsDataURL(input.files[0]);
    }

    $(document).ready(function () {
        $('#category').on('change', function () {
            var categoryId = $('#category option:selected').val();
            if (categoryId) {
                $.ajax({
                    url: '{{url("cpanel/participant/category")}}/get-subcategories?category=' +
                        categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data.data);
                        $('#sub_category').empty();
                        $('#sub_category').append('<option disabled selected></option>');
                        $.each(data.data, function (index, subcategory) {
                            $('#sub_category').append('<option value="' +
                                subcategory.id + '">' + subcategory.name +
                                '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX request failed:', error);
                    }
                });
            } else {
                $('#sub_category').empty();
                $('#sub_category').append('<option disabled selected></option>');
            }
        });
    });

    $(document).ready(function(){
        $("#name, #lastname").keyup(function(){
            var fullname = $("#name").val() + ' ' + $("#lastname").val();
            $("#fullname").val(fullname);
        });
    });
</script>
@endsection