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
            <div class="col-6 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Pending</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </div>

                </div>

            </div>

            <div class="col-6 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi Kadaluarsa</span>
                        <span class="info-box-number">0</span>
                    </div>

                </div>

            </div>

            <div class="col-6 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Transkasi Lunas</span>
                        <span class="info-box-number">100</span>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark border-transparent">
                        <h3 class="card-title text-bold">
                            <i class="fas fa-shopping-cart"></i> Pesanan Terbaru
                        </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-xs btn-light mr-4"><i class="fas fa-eye"></i> Lihat Semua</a>
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
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#" class="text-primary text-bold">INV-TIGATEK-001</a></td>
                                        <td>27-03-3034</td>
                                        <td>Tedy Dev</td>
                                        <td>tedy@mail.com</td>
                                        <td>081280827265</td>
                                        <td>
                                            <span class="text-bold">
                                                Paket 1
                                            </span>
                                            <br>
                                            <small>0-10 Broadcast</small>
                                        </td>
                                        <td>10</td>
                                        <td>Rp 10.000</td>
                                        <td>
                                            <span class="badge badge-success">Lunas</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="text-primary text-bold">INV-TIGATEK-002</a></td>
                                        <td>27-03-3034</td>
                                        <td>Tedy Dev</td>
                                        <td>tedy@mail.com</td>
                                        <td>081280827265</td>
                                        <td>
                                            <span class="text-bold">
                                                Paket 1
                                            </span>
                                            <br>
                                            <small>0-10 Broadcast</small>
                                        </td>
                                        <td>10</td>
                                        <td>Rp 10.000</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="text-primary text-bold">INV-TIGATEK-002</a></td>
                                        <td>27-03-3034</td>
                                        <td>Tedy Dev</td>
                                        <td>tedy@mail.com</td>
                                        <td>081280827265</td>
                                        <td>
                                            <span class="text-bold">
                                                Paket 1
                                            </span>
                                            <br>
                                            <small>0-10 Broadcast</small>
                                        </td>
                                        <td>10</td>
                                        <td>Rp 10.000</td>
                                        <td>
                                            <span class="badge badge-danger">Kadaluarsa</span>
                                        </td>
                                    </tr>
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
