<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$brand_name}} | {{$brand_tagline}}</title>
    <link rel="shortcut icon" href="{{$path_logo}}" type="image/x-icon">

    <!-- Fonts -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/dropzone/min/dropzone.min.css">
    <!-- summernote-->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/summernote/summernote-bs4.min.css">
    <!-- Sweetalert bs4-->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- adminlte-->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/dist/css/adminlte.min.css">

    @yield('styles')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
{{-- <body class="hold-transition sidebar-mini pace-primary"> --}}
<body class="hold-transition sidebar-mini pace-warning pace-done layout-fixed layout-navbar-fixed text-sm accent-warning" style="height: auto;">

{{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="bg-custom-1 w-25" src="{{asset('assets/images/fictro-logo.png')}}" alt="Fictro">
</div> --}}
