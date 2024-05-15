<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <meta property='og:title' content='Title of the article'/>
    <meta property='og:image' content='//media.example.com/ 1234567.jpg'/>
    <meta property='og:description' content='Description that will show in the preview'/>
    <meta property='og:url' content='//www.example.com/URL of the article'/> --}}

    <title>{{ $head_title ?? "Tigatek Broadcast - Broadcast WhatsApp by Tiga Teknologi Persada"}}</title>

    @if (!View::hasSection('meta_tags'))
        <meta name="title" content="{{$brand_name.' - '.$brand_tagline}}"/>
        <meta name="description" content="{{ !empty($seo['default_meta_description']) && $seo['default_meta_description'] != '#' ? strip_tags($seo['default_meta_description']) : strip_tags($footer_caption)}}"/>
        <meta name="keywords" content="{{htmlspecialchars_decode(strip_tags($seo['default_meta_keywords'])) ?? 'Pendidikan, Kesehatan, Penelitian, Pelatihan, Fictro, Aceh, Jakarta'}}"/>
        <meta name="author" content="{{$brand_name ?? env("APP_NAME")}}"/>
        <meta name="keywords" content=""/>
        <meta property="og:site_name" content="{{$brand_name ?? env("APP_NAME")}} - {{$brand_tagline ?? env("APP_NAME")}}"/>
        <meta property="og:locale" content="en-US"/>
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="{{$brand_name.' - '.$brand_tagline}}"/>
        <meta property="og:description" content="{{ !empty($seo['default_meta_description']) && $seo['default_meta_description'] != '#' ? strip_tags($seo['default_meta_description']) : strip_tags($footer_caption)}}"/>
        <meta property="og:url" content="{{request()->url()}}"/>
        <meta property="og:image" content="{{$path_logo}}"/>
        <meta name="twitter:site" content="@fictro"/>
        <meta name="twitter:creator" content="@fictro"/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:title" content="{{$brand_name.' - '.$brand_tagline}}"/>
        <meta name="twitter:description" content="{{ !empty($seo['default_meta_description']) && $seo['default_meta_description'] != '#' ? strip_tags($seo['default_meta_description']) : strip_tags($footer_caption)}}"/>
        <meta name="twitter:image" content="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}"/>
        <link rel="canonical" href="{{request()->url()}}"/>
    @endif

    @yield('meta_tags')

    <link rel="icon" href="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/libraries/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fe-page2/styles/style.css')}}">
    @yield('styles')
    @vite([])
  </head>
  <body>
  <main>
