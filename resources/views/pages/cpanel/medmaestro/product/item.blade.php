@extends('layouts.app')

@section('content')
    @include('pages.cpanel.medmaestro.product.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3">
                    @include('pages.cpanel.medmaestro.product.components.card-product-info')
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm overflow-hidden">
                                {{-- @include('pages.cpanel.medmaestro.product.components.filter-item') --}}
                                @include('pages.cpanel.medmaestro.product.components.table-main-item')
                                @include('pages.cpanel.medmaestro.product.components.pagination-main-item')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card shadow-sm overflow-hidden">
                                {{-- @include('pages.cpanel.medmaestro.product.components.filter-item') --}}
                                @include('pages.cpanel.medmaestro.product.components.table-addon-item')
                                {{-- @include('pages.cpanel.medmaestro.product.components.pagination-secondary-item') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.cpanel.medmaestro.product.components.modal-create-primary-item')
    @include('pages.cpanel.medmaestro.product.components.modal-create-secondary-item')
    @include('pages.cpanel.medmaestro.product.components.modal-edit')

@endsection


@section('scripts')
<script>
    function openFileManagerNew(targetId) {
        var itemId = targetId.split('-').pop(); // Mengambil ID item dari targetId
        document.getElementById('file-input-edit-' + itemId).click();
    }
    function previewImageNew(event, targetId) {
        var itemId = targetId.split('-').pop(); // Mengambil ID item dari targetId
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var target = document.getElementById(targetId);
            // Menghapus gambar yang ada sebelumnya
            while (target.firstChild) {
                target.removeChild(target.firstChild);
            }
            // Menambahkan gambar yang baru dipilih
            var img = document.createElement('img');
            img.classList.add('img-fluid');
            img.classList.add('rounded');
            img.style.width = '60%';
            img.src = dataURL;
            target.appendChild(img);
            // Sembunyikan gambar yang dipilih
            target.style.display = 'block';
            input.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }

    function openFileManagerNewAddon(targetId) {
        var itemId = targetId.split('-').pop(); // Mengambil ID item dari targetId
        document.getElementById('file-input-addon-edit-' + itemId).click();
    }
    function previewImageNewAddon(event, targetId) {
        var itemId = targetId.split('-').pop(); // Mengambil ID item dari targetId
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var target = document.getElementById(targetId);
            // Menghapus gambar yang ada sebelumnya
            while (target.firstChild) {
                target.removeChild(target.firstChild);
            }
            // Menambahkan gambar yang baru dipilih
            var img = document.createElement('img');
            img.classList.add('img-fluid');
            img.classList.add('rounded');
            img.style.width = '60%';
            img.src = dataURL;
            target.appendChild(img);
            // Sembunyikan gambar yang dipilih
            target.style.display = 'block';
            input.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }

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
            // var hintBoxImage = document.getElementById('text-image-hint');
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
            // hintBoxImage.classList.remove('d-none');
            // hintBoxImage.classList.add('d-block');
        };
        reader.readAsDataURL(input.files[0]);
    }

    function openFileManagerAddon() {
        document.getElementById('file-input-addon').click();
    }
    function previewImageAddon(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var box = document.getElementById('box-image-addon');
            var imageContainer = document.getElementById('image-container-addon');
            // var hintBoxImage = document.getElementById('text-image-hint-addon');
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
            // hintBoxImage.classList.remove('d-none');
            // hintBoxImage.classList.add('d-block');
        };
        reader.readAsDataURL(input.files[0]);
    }

    function openFileManagerEdit() {
        document.getElementById('file-input-edit').click();
    }
    function previewImageEdit(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var box = document.getElementById('box-image-edit');
            var imageContainer = document.getElementById('image-container-edit');
            // var hintBoxImage = document.getElementById('text-image-hint-addon');
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
            // hintBoxImage.classList.remove('d-none');
            // hintBoxImage.classList.add('d-block');
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection