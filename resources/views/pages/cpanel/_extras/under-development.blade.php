@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 text-center mt-5">
                <img src="{{asset('assets/images/underdev.svg')}}" class="w-50">
                <h4 class="mt-5">Feature <b class="text-warning">{{request('feature') ?? ' ini'}}</b> is under development</h4>
            </div>
        </div>

    </div>
</section>
@endsection