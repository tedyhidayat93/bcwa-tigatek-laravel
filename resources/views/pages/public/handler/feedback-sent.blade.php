@extends('layouts.frontend')

@section('content')
  <div id="handler">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex flex-column align-items-center justify-center pt-5">
          <img src="{{asset('assets/images/feedback.svg')}}" class="h-25 img-fluid mt-5 mb-5">
          <h3 class="fw-bold fs-1">Yeay, Feedback Berhasil Dikirim</h3>
          <p class="text-center">Kami ucapkan terima kasih atas partisipasinya dan kami berharap anda mendapatkan <br> pengalaman kegiatan yang menyenangkan bersama kami. <br> Salam Sehat SDM Kesehatan Kaliber Dunia. <br>
            #forFinnerFuture</p>
          <a href="/" class="btn btn-lg fw-medium btn-warning rounded-pill mt-4 px-5">Kembali Ke Beranda</a> 
        </div>
      </div>
    </div>
  </div>
@endsection