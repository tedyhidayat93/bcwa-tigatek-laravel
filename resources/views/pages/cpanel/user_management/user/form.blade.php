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
                            {{$method == 'put' ? 'Edit' : 'Create'}} User
                        </h6>
                    </div>
    
                    <div class="card-body">
                        <form action="{{$method == 'post' ? url('cpanel/user-management/users') : url('cpanel/user-management/users/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{$method == 'put' ? method_field('put') : ''}}
                            <input class="form-control form-control-sm text-sm bg-light" id="id" type="hidden" name="id" value="{{$data->id}}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-12 col-sm-10">
                                            <h6 class="text-teal font-weight-bold">Detail Profile</h6>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="name">First Name <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="name" type="text" name="name"
                                                placeholder="First Name" value="{{old('name', $data->name)}}" required>
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="lastname">Last Name</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="lastname" type="text" name="lastname"
                                                placeholder="Last Name" value="{{old('lastname', $data->lastname)}}">
                                            @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="fullname">Full name & title</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="fullname" type="text" name="fullname"
                                                placeholder="Ex: Prof. Lorem Ipsum M.Kom" value="{{old('fullname', $data->fullname)}}">
                                            @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="birthdate">Birthdate</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="birthdate" type="date" name="birthdate" value="{{old('birthdate', $data->birthdate)}}">
                                            @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4">Gender</label>
                                        <div class="col-md-7">
                                            <select name="gender" class="form-control form-control-sm form-select">
                                                <option value="" selected disabled>Select Gender</option>
                                                <option {{$data->gender == 'male' ? 'selected':''}} value="male">Male</option>
                                                <option {{$data->gender == 'female' ? 'selected':''}} value="female">Female</option>
                                            </select>
                                            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="address">Address</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control form-control-sm text-sm" id="address" type="text" name="address"
                                                placeholder="Optional">{{old('address', $data->address)}}</textarea>
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="short_bio">Short Bio</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control form-control-sm text-sm" id="short_bio" type="text" name="short_bio"
                                                placeholder="Optional">{{old('short_bio', $data->short_bio)}}</textarea>
                                            @error('short_bio') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="about">About Me</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control form-control-sm text-sm" rows="5" id="about" type="text" name="about"
                                                placeholder="Optional">{{old('about', $data->about)}}</textarea>
                                            @error('about') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-sm-2"></div>
                                        <div class="col-12 col-sm-10">
                                            <h6 class="text-teal font-weight-bold">Login Access</h6>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="username">Username <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="username" type="text" name="username" placeholder="username"
                                                value="{{old('username', $data->username)}}" {{$method == 'put' && !auth()->user()->hasRole('super-admin') ? 'disabled' : ''}} required>
                                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="email">Email <small class="text-danger">(*)</small></label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="email" type="email" name="email" placeholder="mail@mail.com"
                                                value="{{old('email', $data->email)}}" {{$method == 'put' && !auth()->user()->hasRole('super-admin')  ? 'disabled' : ''}} required>
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="password">Password</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="password" type="text" name="password"
                                                placeholder="********">
                                            <small class="text-info">
                                                {{$method == 'put' ? "*) If you don't want to change your password, you don't need to fill it in and just ignore it" : ""}}
                                            </small>
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4">Roles</label>
                                        <div class="col-md-7">
                                            <select name="roles[]" class="form-control select2" multiple data-placeholder="Select Roles">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    @if(request('partner'))
                                                        @if($role != 'super-admin' && $role != 'admin' && $role != 'finance')
                                                            <option value="{{ $role }}" {{ in_array($role, $user_roles) ? 'selected':'' }}>
                                                                {{ $role }}
                                                            </option>
                                                        @endif
                                                    @else
                                                        <option value="{{ $role }}" {{ in_array($role, $user_roles) ? 'selected':'' }}>
                                                            {{ $role }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                                            <small class="text-info">
                                                {{$method == 'put' ? "*) You can select more than one role if needed" : ""}}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4">Status</label>
                                        <div class="col-md-7">
                                            @php
                                                switch (TRUE) {
                                                    case ($data->status == 'active'):
                                                        $bgstatus = 'bg-success';
                                                        break;        
                                                    case ($data->status == 'inactive'):
                                                        $bgstatus = 'bg-danger';
                                                        break;        
                                                    case ($data->status == 'suspend'):
                                                        $bgstatus = 'bg-warning';
                                                        break;        
                                                    default:
                                                        $bgstatus = 'bg-white';
                                                        break;
                                                }
                                            @endphp
                                            <select name="status" class="form-control form-control-sm form-select {{$bgstatus}}">
                                                <option {{$data->status == 'active' ? 'selected' : ''}} class="bg-success" value="active" selected>Active</option>
                                                <option {{$data->status == 'inactive' ? 'selected' : ''}} class="bg-danger" value="inactive">Inacvtive</option>
                                            </select>
                                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4">Assign to Partner</label>
                                        <div class="col-md-7">
                                            <div class="d-flex flex-column">
                                                <select name="partner" class="form-control select2" data-placeholder="Select Partner">
                                                    <option value="">Select Partner</option>
                                                    @foreach ($partners as $partner)
                                                    <option
                                                        value="{{ $partner->id }}"
                                                        {{  $partner->id == $data->partner_id || $partner->id == request('partner') ? 'selected':'' }}
                                                    >
                                                        {{ $partner->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-info">*) If you fill in this partner, the user will be recorded as part of that partner.</small>
                                                <a href="{{route('cpanel.partner.create')}}" style="font-size: 9pt;" class="text-success my-2"><i class="fas fa-plus"></i> Add New Partner</a>
                                            </div>
                                            @error('partner') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-sm-2"></div>
                                        <div class="col-12 col-sm-10">
                                            <h6 class="text-teal font-weight-bold">Contact & Social Media</h6>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="phone">Phone</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="phone" type="text" name="phone" placeholder="0812xxxxxxxx"
                                                value="{{old('phone', $data->phone)}}">
                                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="whatsapp">WhatsApp</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="whatsapp" type="text" name="whatsapp" placeholder="wa.me/0812xxxxxxxxx"
                                                value="{{old('whatsapp', $data->whatsapp)}}">
                                            @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="linkedin">Linked In</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="linkedin" type="text" name="linkedin" placeholder="linkedin.com/in/your-account"
                                                value="{{old('linkedin', $data->linkedin)}}">
                                            @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="instagram">Instagram</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="instagram" type="text" name="instagram" placeholder="instagram.com/your-username"
                                                value="{{old('instagram', $data->instagram)}}">
                                            @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="facebook">Facebook</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="facebook" type="text" name="facebook" placeholder="facebook.com/your-username"
                                                value="{{old('facebook', $data->facebook)}}">
                                            @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="twitter">Twitter</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="twitter" type="text" name="twitter" placeholder="twitter.com/your-username"
                                                value="{{old('twitter', $data->twitter)}}">
                                            @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="tiktok">Tiktok</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="tiktok" type="text" name="tiktok" placeholder="tiktok.com/your-username"
                                                value="{{old('tiktok', $data->tiktok)}}">
                                            @error('tiktok') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-5 col-form-label text-md-right pr-4" for="youtube">Youtube</label>
                                        <div class="col-sm-7">
                                            <input class="form-control form-control-sm text-sm" id="youtube" type="text" name="youtube" placeholder="youtube.com/your-username"
                                                value="{{old('youtube', $data->youtube)}}">
                                            @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 p-0">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1 text-center cursor-pointer">
                                            <div class="border rounded p-3 mb-2 bg-white shadow-sm d-flex flex-column justify-content-center align-items-center" id="box-image" onclick="openFileManager()">
                                                <input type="file" name="avatar" class="d-none form-control" accept="image/*" id="file-input" onchange="previewImage(event)">
                                                <div id="image-container">
                                                    @if($data->avatar)
                                                        <img src="{{asset('uploads/users/avatars/thumb/'.$data->avatar)}}" class="img-fluid">
                                                    @else
                                                        <i class="fas fa-upload fa-3x mb-3 text-info"></i>
                                                        <h4>Upload Image</h4>
                                                        <small>Click here to upload your profile picture</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <small class="text-info {{$method == 'put' ? '' : 'd-none'}}" id="text-image-hint">*) If you want to change the image, click the box above.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-light p-3 mt-4">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <a href="{{url('cpanel/user-management/users')}}" class="btn btn-secondary mr-1">Cancel</a>
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
            img.style.width = '60%';
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

    $(document).ready(function(){
        $("#name, #lastname").keyup(function(){
            var fullname = $("#name").val() + ' ' + $("#lastname").val();
            $("#fullname").val(fullname);
        });
    });
</script>
@endsection