<div class="content-header bg-light shadow-sm" style="margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-10">
                <h1 class="text-lg font-weight-bold">
                    @if(request()->segment(3) == 'roles')
                    Roles
                    @elseif(request()->segment(3) == 'permissions')
                    Permissions
                    @endif
                </h1>
            </div>
            <div class="col-6 col-md-2 d-flex align-items-center justify-content-end">
            </div>
        </div>
    </div>
</div>