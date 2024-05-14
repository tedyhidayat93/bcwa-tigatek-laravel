@extends('layouts.frontend')

@section('content')
<div id="headInvoice"></div>

<section id="invoice">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body py-5 px-md-5">
                        <h1 class="text-center fw-bold">
                            {{$page->name}}
                        </h1>
                        <br>
                        {!!$page->value!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="callAdmin">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="card border-0 rounded overflow-hidden">
                    <div class="card-body bg-warning">
                        <div class="row">
                            <div class="col-md-10 ">
                                <h6 class="fw-bold mb-0 mt-2">
                                    Silahkan menghubungi admin untuk informasi lebih lanjut.
                                </h6>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <a href="{{$contact['whatsapp']}}" class="btn btn-success rounded-pill"><i class="fab fa-whatsapp fa-fw"></i> Hubungi Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

