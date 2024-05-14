
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4 class="mb-0 font-weight-bold mt-1">
                                        <i class="fas fa-layer-group p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                                        Permission List
                                    </h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    @can('create role')
                                    <a href="{{ url('cpanel/user-management/permissions/create') }}" class="btn btn-sm btn-success float-right">
                                        <i class="fas fa-plus fa-fw"></i> Create Permission
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2 pb-0 bg-light">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-12 col-md-2 input-group input-group-sm mb-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light py-0 px-3">
                                                Show
                                            </span>
                                        </div>
                                        <select name="per_page" class="form-control form-select">
                                            @foreach (config('constants.showing_data') as $key => $show)
                                                @if(!request('per_page'))
                                                    <option {{config('constants.default_global_pagination') == $show ? 'selected':''}} value="{{$show}}">{{$show}}</option>
                                                @else:
                                                    <option {{request('per_page') == $show ? 'selected':''}} value="{{$show}}">{{$show}}</option>
                                                @endif;
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-2 form-group mb-0">
                                        <select name="sort_by" class="form-control form-select select2">
                                            <option {{ request('sort_by') == 'newest' ? 'selected':''}} value="newest">Latest</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected':''}} value="oldest">Oldest</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3 form-group mb-0">
                                        <input type="text" name="keyword" class="form-control form-control-sm" value="{{request('keyword')}}" placeholder="Search....">
                                    </div>
                                    <div class="col-12 col-md form-group mb-0">
                                        <button type="submit" class="btn btn-sm btn-outline-primary text-bold">
                                            <i class="fas fa-search"></i> Filter
                                        </button>
                                        @if(request()->query())
                                        <a href="{{url('cpanel/user-management/permissions')}}" class="text-xs text-danger ml-3">Reset Filter</a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="card-body p-0">

                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Permission</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{$permissions->firstItem()+$loop->index}}.</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            @can('update permission')
                                            <a href="{{ url('cpanel/user-management/permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @endcan

                                            @can('delete permission')
                                            <a href="{{ url('cpanel/user-management/permissions/'.$permission->id.'/delete') }}" class="btn btn-sm btn-danger btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <div class="d-block d-md-flex align-items-center justify-content-between px-3">
                                    {!! $permissions->appends(request()->query())->links('components.cpanel.pagination') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
