@extends('layouts.app')

@section('content')
    @include('pages.cpanel.participant.components._header')
    <section class="content  mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-12 d-md-flex align-items-center justify-content-between mb-2">
                    @include('pages.cpanel.participant.components.side-menu')
                    @include('pages.cpanel.participant.components.btn-new-type')
                </div>

                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.participant.components.filter-type')
                        @include('pages.cpanel.participant.components.table-type')
                        @include('pages.cpanel.participant.components.pagination-type')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
