@extends('layouts.app')

@section('content')
    @include('pages.cpanel.message.components._header')
    @include('layouts.components.app.alerts')
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('pages.cpanel.message.components.side-menu')
                </div>

                <div class="col-md-12">
                    @include('pages.cpanel.message.components.form-type')
                </div>
            </div>
        </div>
    </section>
@endsection
