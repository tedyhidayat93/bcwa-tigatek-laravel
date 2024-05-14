@extends('layouts.app')

@section('content')
    @include('pages.cpanel.medizine.components._header')
    <section class="content bg-white">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    @include('pages.cpanel.medizine.components.form-post')
                </div>
            </div>
        </div>
    </section>
@endsection
