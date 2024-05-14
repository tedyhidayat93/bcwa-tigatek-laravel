@extends('layouts.app')

@section('content')
    @include('pages.cpanel.message.components._header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12 pt-3">
                    @include('pages.cpanel.message.components.form-message')
                </div>
            </div>
        </div>
    </section>
@endsection
