@extends('layouts.app')

@section('content')
    @include('pages.cpanel.participant.components._header')
    <section class="content  mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.participant.components.side-menu')
                    @include('pages.cpanel.participant.components.btn-new-category')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.participant.components.filter-category')
                        @include('pages.cpanel.participant.components.table-category')
                        @include('pages.cpanel.participant.components.pagination-category')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
