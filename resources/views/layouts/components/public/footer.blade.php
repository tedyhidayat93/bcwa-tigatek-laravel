<footer>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-7">
                <div class="d-flex algin-items-center gap-3">
                    {{-- <img src="/images/logo.png" class="img-footer-logo" alt=""> --}}
                    {{-- <img src="{{$path_logo ?? asset('assets/fe-page/images/logo.png')}}" class="img-fluid" alt=""> --}}
                    <img src="{{asset('assets/fe-page/images/logo.png')}}" class="img-fluid" alt="">

                    <div>
                        <h4 class="text-warning mb-0">Broadcast WhatsApp</h4>
                        <small>By Tiga Teknologi Persada</small>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-md-end">
                <ul class="nav d-flex flex-wrap gap-3 shortcut-links">
                    <li class="nav-item border-0">
                        <a href="#" class="text-secondary">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item border-0">
                        <a href="#" class="text-secondary">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item border-0">
                        <a href="#" class="text-secondary">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <ul class="nav d-flex flex-wrap gap-3 shortcut-links">
                    @if (request()->segment(1) != 'invoice')
                    <li class="nav-item border-0"><a href="#pricing">Harga</a></li>
                    <li class="nav-item border-0"><a href="#faq">FAQ</a></li>
                    @else
                    <li class="nav-item border-0"><a href="{{route('fe.homepage')}}#pricing">Harga</a></li>
                    <li class="nav-item border-0"><a href="{{route('fe.homepage')}}#faq">FAQ</a></li>
                    @endif
                    <li class="nav-item border-0"><a href="#">Kontak</a></li>
                    <li class="nav-item border-0"><a href="#">Syarat & Ketentuan</a></li>
                    <li class="nav-item border-0"><a href="#">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div class="col-md-5 d-flex justify-content-md-end">
                <p>Copyright {{date('Y')}} &copy; PT. Tiga Teknologi Persada</p>
            </div>
        </div>
    </div>
</footer>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="/libraries/fontawesome/js/all.min.js"></script>
@yield('scripts')


</body>

</html>
