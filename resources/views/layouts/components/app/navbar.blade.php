@php
    switch (true) {
        case (empty(Auth::user()->avatar) && Auth::user()->gender == 'male'):
            $avatar = config('constants.default_ava_male');
            break;
        case (empty(Auth::user()->avatar) && Auth::user()->gender == 'female'):
            $avatar = config('constants.default_ava_female');
            break;
        case (!empty(Auth::user()->avatar)):
            $avatar = asset('uploads/users/avatars/thumb/'.Auth::user()->avatar);
            break;
        default:
            $avatar = config('constants.default_ava');
            break;
    }

    $last_login_time = Auth::user()->last_login ? date('d-m-Y H:i', strtotime(json_decode(Auth::user()->last_login)->datetime)) : '-';
@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-stream text-dark"></i></a>
        </li>
        <li class="nav-item d-none d-md-block">
            <a class="nav-link text-xs text-dark" href="#" role="button">
                {{date('d M Y')}}
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle d-flex" data-toggle="dropdown">
                <span class="d-none d-md-inline text-xs fw-medium mr-2 font-weight-bold text-dark">Hi, {{ Auth::user()->name }}</span>
                <img src="{{$avatar}}"
                    class="user-image img-circle border border-warning" alt="{{Auth::user()->name}}">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded overflow-hidden border-0 shadow-xl mt-2">

                <li class="user-header bg-custom-1 d-flex flex-column justify-content-center align-items-center text-light">
                    <img src="{{$avatar}}"
                        class="user-image img-circle border border-warning bg-white" style="width:70px; height: 70px;" alt="{{Auth::user()->name}}">
                    <div class="mt-2">
                        {{ Auth::user()->name }} ({!! auth()->user()->getRoleNames()->implode(', ') !!})
                        <br>
                        <small class="text-warning">
                            {{ Auth::user()->email }}
                        </small>
                    </div>
                    <small class="">Last login: {{$last_login_time}}</small>
                </li>
                <li class="user-footer text-center">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-danger"><i class="fas fa-power-off fa-fw"></i> {{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
