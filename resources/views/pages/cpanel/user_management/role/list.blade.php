
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
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4 class="mb-0 font-weight-bold mt-1">
                                        <i class="fas fa-layer-group p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                                        Role List
                                    </h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    @can('create role')
                                    <a href="{{ url('cpanel/user-management/roles/create') }}" class="btn btn-sm btn-success float-right">
                                        <i class="fas fa-plus fa-fw"></i> Create Role
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">

                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role Name</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ url('cpanel/user-management/roles/'.$role->id.'/give-permissions') }}" class="btn btn-sm bg-dark">
                                                <i class="fas fa-key fa-fw"></i>
                                            </a>

                                            @can('update role')
                                            <a href="{{ url('cpanel/user-management/roles/'.$role->id.'/edit') }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-pen fa-fw"></i>
                                            </a>
                                            @endcan

                                            @can('delete role')
                                            @if($role->name != 'super-admin')
                                            <a href="{{ url('cpanel/user-management/roles/'.$role->id.'/delete') }}" class="btn btn-sm btn-danger btn-delete">
                                                <i class="fas fa-trash fa-fw"></i>
                                            </a>
                                            @endif
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
