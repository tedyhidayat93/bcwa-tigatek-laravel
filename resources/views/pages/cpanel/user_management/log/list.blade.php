
@extends('layouts.app')

@section('content')
    @include('pages.cpanel.user_management.components._header-log')
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
                                        Logs
                                    </h4>
                                </div>
                                <div class="col-12 col-md-6">
                                </div>
                            </div>
                        </div>
                        @include('pages.cpanel.user_management.components.filter-log')
                        <div class="card-body p-0 table-responsive border-top">

                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th class="py-2">#</th>
                                        <th class="py-2">User</th>
                                        <th class="py-2">Access Module</th>
                                        <th class="py-2">Action</th>
                                        <th class="py-2">Access Via</th>
                                        <th class="py-2">IP Address</th>
                                        {{-- <th class="py-2">User Agent</th> --}}
                                        <th class="py-2">Message</th>
                                        <th class="py-2">Datetime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($logs as $log)
                                    <tr>
                                        <td>{{$logs->firstItem()+$loop->index}}.</td>
                                        <td>
                                            @if($log->user_id)
                                            <div class="d-flex align-items-center">
                                                <div class="tbl-img bg-light border">
                                                    @php
                                                        switch (true) {
                                                            case (empty($log->user->avatar) && $log->user->gender == 'male'):
                                                            $avatar = config('constants.default_ava_male');
                                                            break;
                                                            case (empty($log->user->avatar) && $log->user->gender == 'female'):
                                                                $avatar = config('constants.default_ava_female');
                                                                break;
                                                                case (!empty($log->user->avatar)):
                                                                $avatar = asset('uploads/users/avatars/thumb/'.$log->user->avatar);
                                                                break;
                                                                default:
                                                                $avatar = config('constants.default_ava');
                                                                break;
                                                            }
                                                            @endphp
                                                    <img src="{{ $avatar }}" alt="{{$log->user->name}}">
                                                </div>
                                                <span class="ml-2">{{$log->user->name}}</span>
                                            </div>
                                            @else:
                                            Undefine
                                            @endif
                                        </td>
                                        <td>{{ $log->module }}</td>
                                        <td>
                                            @php
                                                switch (true) {
                                                    case (strtolower($log->action) == 'read'):
                                                        $action_bg = 'info';
                                                        break;
                                                    case (strtolower($log->action) == 'create'):
                                                        $action_bg = 'success';
                                                        break;
                                                    case (strtolower($log->action) == 'update'):
                                                        $action_bg = 'primary';
                                                        break;
                                                    case (strtolower($log->action) == 'delete'):
                                                        $action_bg = 'danger';
                                                        break;
                                                    case (strtolower($log->action) == 'login'):
                                                        $action_bg = 'purple';
                                                        break;
                                                    default:
                                                        $action_bg = 'gray';
                                                        break;
                                                }
                                            @endphp
                                            <span class="badge bg-{{$action_bg}}">{{ $log->action }}</span>
                                        </td>
                                        <td>{{ $log->device }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        {{-- <td>{{ $log->user_agent }}</td> --}}
                                        <td>{{ $log->message }}</td>
                                        <td>{{  date('d/m/Y H:i', strtotime($log->created_at)) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5 bg-white">
                                            <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                                            <br>
                                            {{config('constants.notfound_data_message')}}
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                        @include('pages.cpanel.user_management.components.pagination-logs')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
