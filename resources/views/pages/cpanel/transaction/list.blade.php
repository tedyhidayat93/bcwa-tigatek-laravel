@extends('layouts.app')

@section('content')
    @include('pages.cpanel.transaction.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
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
