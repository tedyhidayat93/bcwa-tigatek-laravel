@include('layouts.components.auth.header')
<div class="bg-transparent min-vh-100 d-flex flex-row align-items-center">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('layouts.components.auth.footer')