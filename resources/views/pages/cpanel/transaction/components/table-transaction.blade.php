<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>No. Invoice</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Email</th>
                <th>WhatsApp</th>
                <th>Paket</th>
                <th>Jumlah Request</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $key => $trx)
            <tr>
                <td>{{$transactions->firstItem()+$loop->index}}.</td>
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
                <td>{{$trx->qty}}</td>
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
                </br>
                <td>
                    <button type="button" class="btn btn-dark btn-xs px-3" data-toggle="modal" data-target="#modal-detail-payment{{$key}}">
                        <small> <i class="fas fa-eye fa-fw"></i> <b> Detail </b> </small>
                    </button>

                    <div class="modal fade" id="modal-detail-payment{{$key}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mr-2"><i class="fas fa-receipt fa-fw"></i> Detail Invoice</h4>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="card card-body h-100">
                                                <small class="text-secondary">Nomor Invoice :</small>
                                                <h2 class="fw-bold fs-1 mb-0 text-success">{{$trx->inv_number}}</h2>
                                                <small class="text-secondary">Tanggal Invoice:</small>
                                                <p class="fw-medium">{{ date('d-m-Y', strtotime($trx->date))}}</p>
                                                <small class="text-secondary">Tanggal Validasi Lunas:</small>
                                                <p class="fw-medium">{{ !empty($trx->paid_at) ? date('d-m-Y', strtotime($trx->paid_at)) : '-'}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card card-body h-100">
                                                <h6 class="text-secondary"><i class="fas fa-user fa-fw"></i> Data Pemesan</h6>
                                                <table class="table table-borderless w-100 table-sm">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th width="20">:</th>
                                                        <td>{{$trx->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th width="20">:</th>
                                                        <td>{{$trx->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>No.Telepon/WhatsApp</th>
                                                        <th width="20">:</th>
                                                        <td>{{$trx->whatsapp}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            @if (!empty($trx->payment_proof))
                                            <h6>Bukti Transfer</h6>
                                            <img src="{{asset('uploads/proof_payments/normal/') . '/' . $trx->payment_proof}}" class="img-thumbnail img-fluid">
                                            @else
                                            <h4>Belum Ada Bukti Transfer !</h4>
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            <form action="{{route('cpanel.transaction.update')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{$trx->id}}" name="id">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" class="form-control form-select">
                                                        <option value="" disabled selected> -- Pilih Status --</option>
                                                        <option {{$trx->status == 'PENDING' ? 'selected' : ''}} value="PENDING">PENDING / MENUNGGU KONFIRMASI</option>
                                                        <option {{$trx->status == 'EXPIRED' ? 'selected' : ''}} value="EXPIRED">KADALUARSA</option>
                                                        <option {{$trx->status == 'REJECTED' ? 'selected' : ''}} value="REJECTED">TOLAK</option>
                                                        <option {{$trx->status == 'PAID' ? 'selected' : ''}} value="PAID">LUNAS</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Keterangan</label>
                                                    <textarea name="note" class="form-control" id="" rows="6">{{$trx->note}}</textarea>
                                                </div>
                                                <button type="submit" class="btn float-right btn-success ml-2"><i class="fas fa-save"></i> Update Status</button>
                                                <button type="button" data-dismiss="modal" aria-label="Close" class="btn float-right btn-secondary">Tutup</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
