<footer>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-7">
                <div class="d-flex algin-items-center gap-3">
                    <img src="{{$path_logo ?? asset('assets/fe-page/images/logo.png')}}" alt="{{$brand_name ?? 'Tigatek'}}" class="img-fluid">
                    <div>
                        <h4 class="text-warning mb-0">{{$brand_name}}</h4>
                        <small>{{$brand_tagline}}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-md-end">
                <ul class="list-group d-flex flex-row flex-md-row list-group-flush gap-2 mb-3">
                    @if(!empty($socmed['instagram']) && $socmed['linkedin'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['linkedin']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-linkedin text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($socmed['instagram']) && $socmed['instagram'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['instagram']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-instagram text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($socmed['facebook']) && $socmed['facebook'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['facebook']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-facebook text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($socmed['x']) && $socmed['x'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['x']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-twitter text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($socmed['tiktok']) && $socmed['tiktok'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['tiktok']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-tiktok text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                    @if(!empty($socmed['youtube']) && $socmed['youtube'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent p-0 d-flex align-items-center text-wrap">
                        <a target="_blank" href="{{$socmed['youtube']}}" class="">
                            <span class="bg-dark shadow-sm rounded px-2 py-2 d-flex align-items-center justify-content-center">
                                <i class="fab fa-youtube text-white"></i>
                            </span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex gap-1">{!! $address !!}</div>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <ul class="list-group d-flex flex-row flex-wrap align-items-center gap-1 gap-md-3 list-group-flush">
                    @if(!empty($contact['phone']) && $contact['phone'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent px-0 gap-1 ps-0 d-flex align-items-center text-wrap">
                        <i class="fas fa-phone fa-fw text-light"></i>
                        <div>
                            <a class="fw-medium text-link-footer" href="telp:0812338293841">{{$contact['phone']}}</a>
                        </div>
                    </li>
                    @endif
                    @if(!empty($contact['email']) && $contact['email'] != '#')
                    <li class="list-group-item border-0 rounded bg-transparent px-0 gap-1 ps-0 d-flex align-items-center text-wrap">
                        <i class="fas fa-envelope fa-fw text-light"></i>
                        <div>
                            <a class="fw-medium text-link-footer" href="mailto:{{$contact['email']}}">{{$contact['email']}}</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <ul class="nav d-flex flex-wrap gap-3 shortcut-links">
                    @if (request()->segment(1) == '')
                    <li class="nav-item border-0"><a href="#pricing">Harga</a></li>
                    <li class="nav-item border-0"><a href="#faq">FAQ</a></li>
                    @else
                    <li class="nav-item border-0"><a href="{{route('fe.homepage')}}#pricing">Harga</a></li>
                    <li class="nav-item border-0"><a href="{{route('fe.homepage')}}#faq">FAQ</a></li>
                    @endif
                    <li class="nav-item border-0"><a href="{{$contact['whatsapp'] ?? '#'}}">Kontak</a></li>
                    @foreach ($footer_links as $page)
                    <li class="nav-item border-0"><a href="{{route('fe.page', $page->slug)}}">{{$page->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-5 d-flex justify-content-md-end" style="font-size: 12px;">
                <p>Copyright {{date('Y')}} &copy; {{$footer_brand}}</p>
            </div>
        </div>
    </div>
</footer>

</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{asset('assets/libraries/fontawesome/js/fontawesome.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function copyToClipboard(data) {
        var el = document.createElement('textarea');
        el.value = data;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        Swal.fire({
            icon: "success",
            timer: 2000,
            text: 'Berhasil menyalin ke papan klip: ' + data,
            showConfirmButton: false
        });
    }
</script>

@yield('scripts')


</body>

</html>
