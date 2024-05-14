@extends('layouts.app')

@section('content')
    @include('pages.cpanel.user_management.components._header')
    <section class="content mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-md-2">
                    @include('pages.cpanel.user_management.components.side-menu')
                </div>

                <div class="col-md-10">
                    <div class="card border-none shadow-sm">
                        <div class="card-header">
                            <h4 class="mb-0 font-weight-bold mt-1">
                                <i class="fas fa-pen p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                                Edit Role
                            </h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <ul class="alert alert-warning mb-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ url('cpanel/user-management/roles/'.$role->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="">Role Name</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <a href="{{ url('cpanel/user-management/roles') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
