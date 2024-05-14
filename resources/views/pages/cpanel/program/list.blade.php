@extends('layouts.app')

@section('content')
    @include('pages.cpanel.program.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.program.components.side-menu')
                    @include('pages.cpanel.program.components.btn-new-program')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.program.components.filter-program')
                        @include('pages.cpanel.program.components.table-program')
                        @include('pages.cpanel.program.components.pagination-program')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection