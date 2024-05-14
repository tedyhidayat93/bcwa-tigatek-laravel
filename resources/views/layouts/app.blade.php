@include('layouts.components.app.header')
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.components.app.navbar')
    <!-- Main Sidebar Container -->
    @include('layouts.components.app.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.components.app.copyright')
    <!-- Control Sidebar -->
    {{-- @include('layouts.components.app.control') --}}
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.components.app.footer')
