@extends('layouts.app')

@section('content')
    @include('pages.cpanel.information.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.information.components.filter-information')
                        @include('pages.cpanel.information.components.table-information')
                        @include('pages.cpanel.information.components.pagination-information')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
