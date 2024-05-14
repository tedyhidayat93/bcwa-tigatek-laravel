<aside class="main-sidebar sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-custom-1">
        <img src="{{ $path_logo }}" alt="Fictro" class="brand-image elevation-1 rounded-sm">
        <span class="brand-text font-weight-bolder text-warning text-uppercase">{{$brand_name}} PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-custom-1">

        <!-- SidebarSearch Form -->
        {{-- @role(['super-admin','admin']) --}}
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar text-sm bg-transparent" type="search"
                    placeholder="Search Menu..." aria-label="Search">
            </div>
        </div>
        {{-- @endrole --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">

                <li class="nav-item mt-3">
                    <a href="{{url('cpanel/dashboard')}}" class="nav-link {{request()->segment(2) == 'dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link {{request()->segment(2) == 'faq' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{request()->segment(2) == 'transaction' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{request()->segment(2) == 'package' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Paket Broadcast
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{request()->segment(2) == 'setting' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
