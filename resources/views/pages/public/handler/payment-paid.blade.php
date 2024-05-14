@extends('layouts.frontend')

@section('content')
  <div id="handler">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex flex-column align-items-center justify-center pt-5">
          <img src="{{asset('assets/images/paid.svg')}}" class="h-25 img-fluid mt-5 mb-5">
          <h3 class="fw-bold fs-1">Yeay ! Pembayaranmu Berhasil</h3>
          <p>Silakan cek email mu untuk melihat invoice pembayaran.</p>
          <a href="/" class="btn btn-lg fw-medium btn-warning rounded-pill mt-4 px-5">Kembali Ke Beranda</a> 
        </div>
      </div>
    </div>
  </div>
@endsection