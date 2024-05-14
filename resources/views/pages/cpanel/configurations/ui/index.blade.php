@extends('layouts.app')

@section('content')
    @include('pages.cpanel.configurations.ui.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-2">
                    @include('pages.cpanel.configurations.ui.components.side-menu')
                </div>
                <div class="col-md-10">
                    @if(request()->segment(2) == 'settings' && request()->segment(3) == 'ui' && request()->segment(4) == 'slider')
                        @include('pages.cpanel.configurations.ui.components.slider.table')
                        @include('pages.cpanel.configurations.ui.components.slider.modal-create')
                    @else
                        @include('pages.cpanel.configurations.ui.components.blank')
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
