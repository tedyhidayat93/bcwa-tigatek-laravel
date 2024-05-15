<nav class="navbar navbar-expand-lg bg-dark" id="main-navbar" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#hero">
            {{-- <img src="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" class="img-fluid" alt=""> --}}
            <img src="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" alt="{{$brand_name ?? 'Tigatek'}}" class="logo-main-nav">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @if (request()->segment(1) == '')
            <ul class="navbar-nav ms-auto mb-2 me-4 mb-lg-0 gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="#pricing">Harga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{$contact['whatsapp'] ?? '#'}}">Hubungi Kami</a>
                </li>
            </ul>
            <div class="d-flex" role="search">
                <a href="#pricing" id="cta-to-buy" class="btn btn-warning rounded-pill me-2">
                    <i class="fas fa-fw fa-shopping-cart"></i> Pesan Sekarang
                </a>
            </div>
            @else
            <ul class="navbar-nav ms-auto mb-2 me-4 mb-lg-0 gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fe.homepage')}}#pricing">Harga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fe.homepage')}}#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{$contact['whatsapp'] ?? '#'}}">Hubungi Kami</a>
                </li>
            </ul>
            <div class="d-flex" role="search">
                <a href="{{route('fe.homepage')}}#pricing" id="cta-to-buy" class="btn btn-warning rounded-pill me-2">
                    <i class="fas fa-fw fa-shopping-cart"></i> Pesan Sekarang
                </a>
            </div>
            @endif
        </div>
    </div>
</nav>
