@extends('layouts.app')

@section('content')
    @include('pages.cpanel.configurations.system.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-2">
                    @include('pages.cpanel.configurations.system.components.side-menu')
                </div>
                <div class="col-md-10">
                    @if(!empty(request()->group))
                        @include('pages.cpanel.configurations.system.components.table')
                    @else
                        @include('pages.cpanel.configurations.system.components.blank')
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
