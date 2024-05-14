@extends('layouts.app')

@section('content')
    @include('pages.cpanel.page.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.page.components.filter-page')
                        @include('pages.cpanel.page.components.table-page')
                        @include('pages.cpanel.page.components.pagination-page')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
