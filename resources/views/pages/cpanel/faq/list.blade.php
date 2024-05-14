@extends('layouts.app')

@section('content')
    @include('pages.cpanel.faq.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.faq.components.filter-faq')
                        @include('pages.cpanel.faq.components.table-faq')
                        @include('pages.cpanel.faq.components.pagination-faq')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
