<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <title>{{$brand_name ?? env("APP_NAME")}} | {{$brand_tagline ?? env("APP_NAME")}}</title>
    <link rel="shortcut icon" href="{{$path_logo ?? asset('assets/fe-page/images/logo.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="icon" href="{{$path_logo ?? asset('assets/fe-page/images/logo.png')}}" type="image/x-icon">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/ui-admin/')}}/dist/css/adminlte.min.css">

    <style>
        .bg-auth {
            background-image: url("{{asset('assets/images/event-login-bg.jpeg')}}");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        .bg-form {
            background: hsla(266, 63%, 26%, 1);
            background: linear-gradient(90deg, hsla(266, 63%, 26%, 1) 0%, hsla(354, 55%, 63%, 1) 50%, hsla(31, 100%, 74%, 1) 100%);
            background: -moz-linear-gradient(90deg, hsla(266, 63%, 26%, 1) 0%, hsla(354, 55%, 63%, 1) 50%, hsla(31, 100%, 74%, 1) 100%);
            background: -webkit-linear-gradient(90deg, hsla(266, 63%, 26%, 1) 0%, hsla(354, 55%, 63%, 1) 50%, hsla(31, 100%, 74%, 1) 100%);
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#3E196E", endColorstr="#D46C76", GradientType=1 );
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

{{-- <body class="hold-transition login-page"> --}}
<body class="hold-transition bg-custom-1">
