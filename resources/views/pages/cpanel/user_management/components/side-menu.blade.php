<div class="card">
    <div class="card-header bg-custom-1">
        <h3 class="card-title">Menu</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-fw fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{url('cpanel/user-management/roles')}}" class="nav-link {{request()->segment(3) == 'roles' ? 'text-primary':''}}">
                    <i class="far fa-fw fa-folder{{request()->segment(2) == 'medizine' && request()->segment(3) == 'roles' ? '-open':''}}"></i> Roles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('cpanel/user-management/permissions')}}" class="nav-link {{request()->segment(3) == 'permissions' ? 'text-primary':''}}">
                    <i class="far fa-fw fa-folder{{request()->segment(2) == 'medizine' && request()->segment(3) == 'permissions' ? '-open':''}}"></i> Permissions
                </a>
            </li>
        </ul>
    </div>

</div>
