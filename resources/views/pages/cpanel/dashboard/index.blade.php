@extends('layouts.app')

@section('content')
<div class="content-header bg-light shadow-sm mb-4" style="margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-10">
                <h1 class="mt-2 text-lg font-weight-bold">Dashboard</h1>
            </div>
            <div class="col-6 col-md-2 d-flex align-items-center justify-content-end">
                {{-- <div class="input-group w-75 border rounded">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0">Filter</span>
                    </div>
                    <input type="number" min="0" minlength="4" maxlength="4" class="form-control bg-white text-center border-0" value="{{date('Y')}}">
                </div> --}}
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp {{number_format($trx_counter['total_income_paid'], 0, ',', '.')}}</h3>
                        <p>Pendapatan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Pending</span>
                        <span class="info-box-number">
                            {{$trx_counter['pending']}}
                        </span>
                    </div>
                </div>

            </div>
            <div class="col-6 col-sm-6 col-md">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="far fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Menunggu Konfirmasi</span>
                        <span class="info-box-number">
                            {{$trx_counter['waitting_confirmation']}}
                        </span>
                    </div>
                </div>

            </div>

            <div class="col-6 col-sm-6 col-md">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Kadaluarsa</span>
                        <span class="info-box-number">{{$trx_counter['expired']}}</span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Ditolak</span>
                        <span class="info-box-number">{{$trx_counter['rejected']}}</span>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transkasi Lunas</span>
                        <span class="info-box-number">{{$trx_counter['paid']}}</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark border-transparent">
                        <h3 class="card-title text-bold">
                            <i class="fas fa-shopping-cart"></i> 10 Pesanan Terbaru
                        </h3>
                        <div class="card-tools">
                            <a href="{{route('cpanel.transaction.list')}}" class="btn btn-xs btn-light mr-4"><i class="fas fa-eye"></i> Lihat Semua</a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No. Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>WhatsApp</th>
                                        <th>Paket</th>
                                        <th>Jumlah Request</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $trx)
                                    <tr>
                                        <td><a href="{{route('fe.payment-invoice', ['inv' => $trx->inv_number])}}" target="_blank" class="text-primary text-bold">{{$trx->inv_number}}</a></td>
                                        <td>{{date('d-m-Y', strtotime($trx->date))}}</td>
                                        <td>{{$trx->name}}</td>
                                        <td>{{$trx->email}}</td>
                                        <td>{{$trx->whatsapp}}</td>
                                        <td>
                                            <span class="text-bold">
                                                {{$trx->package->name}}
                                            </span>
                                            <br>
                                            <small>Rp {{number_format($trx->package->price, 0, '.', ',')}}</small>
                                        </td>
                                        <td>{{$trx->qty}} Broadcast</td>
                                        <td>Rp {{number_format($trx->amount, 0, ',', '.')}}</td>
                                        <td>
                                            @if($trx->status == 'PENDING' && empty($trx->payment_proof))
                                                <span class="badge bg-warning rounded-pill p-2 text-dark"><i class="far fa-clock"></i> Menunggu Pembayaran</span>
                                            @elseif($trx->status == 'PENDING' && !empty($trx->payment_proof))
                                                <span class="badge bg-info rounded-pill p-2 text-dark"><i class="far fa-clock"></i> Menunggu Konfirmasi</span>
                                            @elseif($trx->status == 'PAID')
                                                <span class="badge bg-success rounded-pill p-2 text-white"><i class="fas fa-check"></i> Lunas</span>
                                            @elseif($trx->status == 'REJECTED')
                                                <span class="badge bg-danger rounded-pill p-2 text-white"><i class="fas fa-times"></i> Ditolak</span>
                                            @elseif($trx->status == 'EXPIRED')
                                                <span class="badge bg-secondary rounded-pill p-2 text-white"><i class="fas fa-times"></i> Kadaluarsa</span>
                                            @else
                                                <span class="badge bg-light rounded-pill p-2 text-white">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
</section>
@endsection

@section('scripts')
<!-- jQuery Mapael -->
<script src="{{asset('assets/ui-admin/')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('assets/ui-admin/')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('assets/ui-admin/')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('assets/ui-admin/')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets/ui-admin/')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Only this page demo -->
<script src="{{asset('assets/ui-admin/')}}/dist/js/pages/dashboard2.js"></script>
@endsection
