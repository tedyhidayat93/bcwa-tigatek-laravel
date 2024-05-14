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
                {{date('l, d M Y')}}
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}
        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('assets/ui-admin/')}}/dist/img/user1-128x128.jpg" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('assets/ui-admin/')}}/dist/img/user8-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('assets/ui-admin/')}}/dist/img/user3-128x128.jpg" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> --}}
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
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
                    @can('view profile')
                    <a href="{{route('cpanel.me.profile')}}" class="btn btn-warning">
                        <i class="fas fa-user fa-fw"></i> My Profile
                    </a>
                    @endcan
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
