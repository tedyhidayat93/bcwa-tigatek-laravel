@extends('layouts.app')

@section('content')
    @include('pages.cpanel.transaction.components._header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.components.app.alerts')
                </div>
                <div class="col-md-12">
                    @include('pages.cpanel.transaction.components.form-transaction')
                </div>
            </div>
        </div>
    </section>
@endsection
