<aside class="main-sidebar sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-custom-1">
        <img src="{{$path_logo ?? asset('assets/fe-page2/images/logo.png')}}" alt="Fictro" class="brand-image elevation-1 rounded-sm">
        <span class="brand-text font-weight-bolder text-warning text-uppercase">{{$brand_name ?? 'ADMIN'}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-custom-1">

        <!-- SidebarSearch Form -->
        {{-- @role(['super-admin','admin']) --}}
        {{-- <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar text-sm bg-transparent" type="search"
                    placeholder="Search Menu..." aria-label="Search">
            </div>
        </div> --}}
        {{-- @endrole --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

                <li class="nav-item mt-3">
                    <a href="{{url('cpanel/dashboard')}}" class="nav-link {{request()->segment(2) == 'dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fab fa-windows"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cpanel.transaction.list') }}" class="nav-link {{request()->segment(2) == 'transaction' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Daftar Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cpanel.package.list') }}" class="nav-link {{request()->segment(2) == 'package' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Paket Broadcast
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cpanel.faq.list') }}" class="nav-link {{request()->segment(2) == 'faq' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cpanel.page.list') }}" class="nav-link {{request()->segment(2) == 'page' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Halaman
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cpanel.settings.system.list', [
                        'group' => 'GENERAL_PROFILE'
                    ]) }}" class="nav-link {{request()->segment(2) == 'settings' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger {{request()->segment(2) == 'setting' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
