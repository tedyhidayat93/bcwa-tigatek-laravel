@php
    switch (true) {
        case (empty(Auth::user()->avatar) && Auth::user()->gender == 'male'):
            $avatar = config('constants.default_ava_male');
            break;
        case (empty(Auth::user()->avatar) && Auth::user()->gender == 'female'):
            $avatar = config('constants.default_ava_female');
            break;
        case (!empty(Auth::user()->avatar)):
            $avatar = asset('uploads/users/avatars/thumb/'.Auth::user()->avatar);
            break;
        default:
            $avatar = config('constants.default_ava');
            break;
    }

    $last_login_time = Auth::user()->last_login ? date('d-m-Y H:i', strtotime(json_decode(Auth::user()->last_login)->datetime)) : '-';
@endphp

@extends('layouts.app')

@section('content')
@include('pages.cpanel.profile.components._header')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('layouts.components.app.alerts')
            </div>
            <div class="col-md-3">
                @include('pages.cpanel.profile.components.card-profile')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        @include('pages.cpanel.profile.components.tab-nav')
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @include('pages.cpanel.profile.components.card-setting')
                            @include('pages.cpanel.profile.components.card-log')
                        </div>
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
</script>
@endsection