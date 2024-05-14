@extends('layouts.app')

@section('content')
    @include('pages.cpanel.medmaestro.product.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.medmaestro.product.components.filter')
                        @include('pages.cpanel.medmaestro.product.components.table')
                        @include('pages.cpanel.medmaestro.product.components.pagination')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('pages.cpanel.medmaestro.product.components.modal-create')
@endsection
