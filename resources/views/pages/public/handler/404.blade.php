@extends('layouts.frontend')

@section('content')
  <div id="handler">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex flex-column align-items-center justify-center pt-5">
          <img src="{{asset('assets/images/404.svg')}}" class="h-25 img-fluid mt-5 mb-5">
          <h3 class="fw-bold fs-1">404 !</h3>
          <p>Halaman yang kamu cari tidak ditemukan.</p>
          <a href="/" class="btn btn-lg fw-medium btn-warning rounded-pill mt-4 px-5">Kembali Ke Beranda</a> 
        </div>
      </div>
    </div>
  </div>
@endsection