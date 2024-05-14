@extends('layouts.app')

@section('content')
    @include('pages.cpanel.package.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.package.components.filter-package')
                        @include('pages.cpanel.package.components.table-package')
                        @include('pages.cpanel.package.components.pagination-package')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
