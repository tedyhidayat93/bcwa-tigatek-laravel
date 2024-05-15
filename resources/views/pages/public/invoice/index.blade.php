@extends('layouts.frontend')

@section('content')
<div id="headInvoice"></div>

<section id="invoice">
    <div class="container">

        <div class="row">
            <div class="col-12">

                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        @include('components.public.alerts')
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="fw-bold fs-4 mb-0">INVOICE</h1>
                                <p><i>Broadcast WhatsApp by Tiga Teknologi Persada</i></p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-md-end align-items-md-center">
                                @if($invoice->status == 'PENDING' && empty($invoice->payment_proof))
                                    <span class="badge bg-warning px-3 rounded-pill py-2 text-dark mb-3"><i class="far fa-clock"></i> Menunggu Pembayaran</span>
                                @elseif($invoice->status == 'PENDING' && !empty($invoice->payment_proof))
                                    <span class="badge bg-info px-3 rounded-pill py-2 text-dark mb-3"><i class="far fa-clock"></i> Menunggu Konfirmasi Admin</span>
                                @elseif($invoice->status == 'PAID')
                                    <span class="badge bg-success px-3 rounded-pill py-2 text-white mb-3"><i class="fas fa-check"></i> Lunas</span>
                                @elseif($invoice->status == 'REJECTED')
                                    <span class="badge bg-danger px-3 rounded-pill py-2 text-white mb-3"><i class="fas fa-times"></i> Ditolak</span>
                                @elseif($invoice->status == 'EXPIRED')
                                    <span class="badge bg-secondary px-3 rounded-pill py-2 text-white mb-3"><i class="fas fa-times"></i> Kadaluarsa</span>
                                @else
                                    <span class="badge bg-light px-3 rounded-pill py-2 text-white mb-3">-</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <small class="text-secondary">Tanggal :</small>
                                <p class="fw-medium">{{ date('d-m-Y', strtotime($invoice->date))}}</p>
                                <small class="text-secondary">Nomor Invoice :</small>
                                <h2 class="fw-bold fs-1 mb-0 text-success">{{$invoice->inv_number}}</h2>
                                <small class="text-secondary">*Harap menyimpan dan mengingat nomor INVOICE
                                    diatas</small>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <p>Data Pemesan :</p>
                                <table class="table table-borderless ps-md-0 table-sm">
                                    <tr>
                                        <th width="200">Nama</th>
                                        <th width="20">:</th>
                                        <td>{{$invoice->name}}</td>
                                    </tr>
                                    <tr>
                                        <th width="200">Email</th>
                                        <th width="20">:</th>
                                        <td>{{$invoice->email}}</td>
                                    </tr>
                                    <tr>
                                        <th width="200">No.Telepon/WhatsApp</th>
                                        <th width="20">:</th>
                                        <td>{{$invoice->whatsapp}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="bg-light">ITEM</th>
                                            <th class="bg-light">JUMLAH KUOTA</th>
                                            <th class="bg-light text-end" width="200">HARGA SATUAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$invoice->package->name}}</td>
                                            <td>{{number_format($invoice->qty, 0, ',', '.')}} Broadcast</td>
                                            <td class="text-end">Rp {{number_format($invoice->package->price, 0, ',', '.')}}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-end">Total Tagihan</th>
                                            <th class="text-end">
                                                <span class="fs-5 fw-bold text-success">
                                                    Rp {{number_format($invoice->amount, 0, ',', '.')}}
                                                </span>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Silakan untuk segera melakukan pembayaran dengan metode transfer ke rekening
                                    berikut :</p>
                                <table class="table table-borderless ps-md-0 table-sm">
                                    <tr>
                                        <th width="150">Nomor Rekening</th>
                                        <th width="10">:</th>
                                        <td>{{$bank['bank_norek']}}</td>
                                    </tr>
                                    <tr>
                                        <th width="150">Nama Bank</th>
                                        <th width="10">:</th>
                                        <td>{{$bank['bank_name']}}</td>
                                    </tr>
                                    <tr>
                                        <th width="150">Atas Nama</th>
                                        <th width="10">:</th>
                                        <td>{{$bank['bank_owner']}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8 d-flex align-items-center justify-content-end">
                                <!-- Button trigger modal -->

                                @if (empty($invoice->payment_proof))
                                <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalBuktiTrf">
                                    <i class="fas fa-receipt fa-fw"></i> Kirim Bukti Transfer
                                </button>
                                @else
                                <h6 class="text-info"><i class="fas fa-check"></i> Bukti pembayaran telah dikirim.</h6>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="modalBuktiTrf" tabindex="-1"
                                    aria-labelledby="modalBuktiTrfLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalBuktiTrfLabel">Kirim Bukti Transfer
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pb-5 pt-3">
                                                <div class="w-100 text-center">
                                                    <i class="fas fa-receipt text-secondary fa-3x mb-4"></i>
                                                </div>
                                                <form action="{{route('fe.payment-proof')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <small class="text-secondary">
                                                        Pastikan file yang dipilih format JPEG, PNG, JPG format (Max size 5 MB)
                                                    </small>
                                                    <div class="form-group my-3">
                                                        <input type="hidden" value="{{$invoice->pacakge_id}}" name="package">
                                                        <input type="hidden" value="{{$invoice->inv_number}}" name="inv_number">
                                                        <input type="file" name="proof_payment" id="proof_payment" class="form-control" accept="image/jpeg, image/png, image/jpg">
                                                    </div>
                                                    <button type="submit" class="btn mt-2 fw-bold btn-warning rounded-pill w-100 shadow-sm">Kirim</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <a href="{{$contact['whatsapp'] ?? '#'}}" class="btn btn-success rounded-pill"><i class="fab fa-whatsapp fa-fw"></i> Hubungi Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

