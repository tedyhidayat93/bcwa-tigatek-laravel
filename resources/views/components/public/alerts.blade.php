@if (session('success'))
<div class="alert-notif alert shadow alert-success alert-dismissible" role="alert">
    <h6 class="font-wieght-bold"><i class="fas fa-check-circle"></i> Yeay !</h6>
    {{ session('success') }}
    <button class="btn-close close" type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('info'))
    <div class="alert-notif alert shadow alert-info alert-dismissible" role="alert">
        <h6 class="font-wieght-bold"><i class="fas fa-info-circle"></i> Informasi</h6>
        {{ session('info') }}
        <button class="btn-close close" type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('warning'))
    <div class="alert-notif alert shadow alert-warning alert-dismissible" role="alert">
        <h6 class="font-wieght-bold"><i class="fas fa-info-circle"></i> Hola !</h6>
        {{ session('warning') }}
        <button class="btn-close close" type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert-notif alert shadow alert-danger alert-dismissible" role="alert">
        <h6 class="font-wieght-bold"><i class="fas fa-times-circle"></i> Maaf !</h6>
        {{ session('error') }}
        <button class="btn-close close" type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert-notif alert shadow alert-danger alert-dismissible" role="alert">
        <h6 class="font-wieght-bold"><i class="fas fa-times-circle"></i> Maaf !</h6>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button class="btn-close close" type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
