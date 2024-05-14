@extends('layouts.app')

@section('content')
    @include('pages.cpanel.participant.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.participant.components.side-menu')
                    @include('pages.cpanel.participant.components.btn-new-data')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.participant.components.filter-data')
                        @include('pages.cpanel.participant.components.table-data')
                        @include('pages.cpanel.participant.components.pagination-data')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
