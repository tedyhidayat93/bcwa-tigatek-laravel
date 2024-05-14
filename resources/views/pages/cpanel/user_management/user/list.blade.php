
@extends('layouts.app')

@section('content')
    @include('pages.cpanel.user_management.components._header-user')
    <section class="content mt-3">
        <div class="container-fluid">
            @include('layouts.components.app.alerts')
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h6 class="mb-0 font-weight-bold mt-1">
                                        <i class="fas fa-layer-group p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>
                                        User List
                                    </h4>
                                </div>
                                <div class="col-12 col-md-6">
                                    @can('create role')
                                    <a href="{{ url('cpanel/user-management/users/create') }}" class="btn btn-sm btn-success float-right">
                                        <i class="fas fa-plus fa-fw"></i> Add User  
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        @include('pages.cpanel.user_management.components.filter-users')
                        <div class="card-body p-0 table-responsive border-top">

                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th class="py-2">#</th>
                                        <th class="py-2"></th>
                                        <th class="py-2">Name</th>
                                        <th class="py-2">Gender</th>
                                        <th class="py-2">Email</th>
                                        <th class="py-2">Phone</th>
                                        <th class="py-2">Roles</th>
                                        <th class="py-2">Status</th>
                                        <th class="py-2">Created At</th>
                                        <th class="py-2" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$users->firstItem()+$loop->index}}.</td>
                                        <td>
                                            <div class="tbl-img bg-light shadow-sm">
                                                @php
                                                    switch (true) {
                                                        case (empty($user->avatar) && $user->gender == 'male'):
                                                            $avatar = config('constants.default_ava_male');
                                                            break;
                                                        case (empty($user->avatar) && $user->gender == 'female'):
                                                            $avatar = config('constants.default_ava_female');
                                                            break;
                                                        case (!empty($user->avatar)):
                                                            $avatar = asset('uploads/users/avatars/thumb/'.$user->avatar);
                                                            break;
                                                        default:
                                                            $avatar = config('constants.default_ava');
                                                            break;
                                                    }
                                                @endphp
                                                <img src="{{ $avatar }}" alt="{{$user->name}}">
                                            </div>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge bg-warning mx-1">{{ $rolename }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <label class="badge bg-{{$user->status == 'active' ? 'success':'gray'}} mx-1">{{ $user->status }}</label>
                                        </td>
                                        <td>{{  date('d/m/Y', strtotime($user->created_at)) }}</td>
                                        <td>
                                            @can('update user')
                                            <a href="{{ url('cpanel/user-management/users/'.$user->id.'/edit') }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @endcan
                                            
                                            @can('delete user')
                                            <a href="{{ url('cpanel/user-management/users/'.$user->id.'/delete') }}" class="btn btn-danger btn-sm btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-5 bg-white">
                                            <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                                            <br>
                                            {{config('constants.notfound_data_message')}}
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>    

                        </div>
                        @include('pages.cpanel.user_management.components.pagination-users')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
