@extends('layouts.app')

@section('content')
    @include('pages.cpanel.mentor.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        @include('pages.cpanel.mentor.components.filter-mentor')
                        @include('pages.cpanel.mentor.components.table-mentor')
                        @include('pages.cpanel.mentor.components.pagination-mentor')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
