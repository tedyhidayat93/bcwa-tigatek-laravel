@extends('layouts.app')

@section('content')
    @include('pages.cpanel.partner.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.partner.components.filter-partner')
                        @include('pages.cpanel.partner.components.table-partner')
                        @include('pages.cpanel.partner.components.pagination-partner')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
