<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col">Created At</th>
                <th scope="col">Payer Name</th>
                <th scope="col">Payer Email</th>
                <th scope="col">Payer Phone</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <td>{{$transactions->firstItem()+$loop->index}}.</td>
                <td>
                    {{ date('d/m/Y H:i', strtotime($transaction->created_at))}}
                </td>
                <td>
                    {{$transaction->payer_name ?? '-'}}
                </td>
                <td>
                    {{$transaction->payer_email ?? '-'}}
                </td>
                <td>
                    {{$transaction->payer_phone ?? '-'}}
                </td>
                <td>
                    {{ $transaction->currency . ' ' . number_format($transaction->grand_total, 0, ',', '.') }}
                </td>
                <td>
                    @php
                        switch (TRUE) {
                            case (strtoupper($transaction->status) == 'PENDING'):
                                $bgstatus = 'bg-warning';
                                break;
                            case (strtoupper($transaction->status) == 'PAID'):
                                $bgstatus = 'bg-success';
                                break;
                            case (strtoupper($transaction->status) == 'SETTLED'):
                                $bgstatus = 'bg-primary';
                                break;
                            case (strtoupper($transaction->status) == 'EXPIRED'):
                                $bgstatus = 'bg-secondary';
                                break;
                            default:
                                $bgstatus = 'bg-light';
                                break;
                        }
                    @endphp

                    <div class="badge {{$bgstatus}}">
                        {{ strtoupper($transaction->status)}}
                    </div>
                </td>
                <td class="text-center">
                    @can('update transaction')
                    <a href="#" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                    @endcan

                    {{-- @can('create invoice')
                    <a href="{{route('cpanel.transaction.delete', $transaction->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-file-alt"></i>
                    </a>
                    @endcan --}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>