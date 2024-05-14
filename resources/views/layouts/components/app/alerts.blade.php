
<div class="row">
    <div class="col-12">
        @if (session('success'))
            <div class="alert-notif alert shadow alert-success alert-dismissible">
                <h6 class="font-wieght-bold"><i class="fas fa-check-circle"></i> Yeay !</h6>
                {{ session('success') }}
                <button class="btn-close close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            </div>
        @endif
        @if (session('info'))
            <div class="alert-notif alert shadow alert-info alert-dismissible">
                <h6 class="font-wieght-bold"><i class="fas fa-info-circle"></i> Information !</h6>
                {{ session('info') }}
                <button class="btn-close close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            </div>
        @endif
        @if (session('warning'))
            <div class="alert-notif alert shadow alert-warning alert-dismissible">
                <h6 class="font-wieght-bold"><i class="fas fa-info-circle"></i> Alert !</h6>
                {{ session('warning') }}
                <button class="btn-close close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert-notif alert shadow alert-danger alert-dismissible">
                <h6 class="font-wieght-bold"><i class="fas fa-times-circle"></i> Sorry !</h6>
                {{ session('error') }}
                <button class="btn-close close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
            </div>
        @endif
    </div>
</div>
