@extends('layouts.app')

@section('content')
    @include('pages.cpanel.transaction.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rp {{number_format($total_income_paid, 0, ',', '.')}}</h3>
                            <p>Pendapatan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.transaction.components.filter-transaction')
                        @include('pages.cpanel.transaction.components.table-transaction')
                        @include('pages.cpanel.transaction.components.pagination-transaction')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
