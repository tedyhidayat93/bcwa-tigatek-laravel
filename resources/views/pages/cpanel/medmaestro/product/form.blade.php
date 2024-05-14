@extends('layouts.app')

@section('content')
    @include('pages.cpanel.medmaestro.product.components._header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    @include('pages.cpanel.medmaestro.product.components.form')
                </div>
            </div>
        </div>
    </section>
@endsection