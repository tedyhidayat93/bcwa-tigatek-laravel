@extends('layouts.app')

@section('content')
    @include('pages.cpanel.medizine.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.medizine.components.side-menu')
                    @include('pages.cpanel.medizine.components.btn-new-post')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.medizine.components.filter-post')
                        @include('pages.cpanel.medizine.components.table-post')
                        @include('pages.cpanel.medizine.components.pagination-post')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
