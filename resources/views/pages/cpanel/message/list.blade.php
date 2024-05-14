@extends('layouts.app')

@section('content')
    @include('pages.cpanel.message.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.message.components.side-menu')
                    @include('pages.cpanel.message.components.btn-new-message')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.message.components.filter-message')
                        @include('pages.cpanel.message.components.table-message')
                        @include('pages.cpanel.message.components.pagination-message')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
