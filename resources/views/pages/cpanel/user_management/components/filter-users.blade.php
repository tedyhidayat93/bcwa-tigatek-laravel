<div class="card-body p-2 pb-0 bg-light">
    <form method="GET">
        <div class="row">
            <div class="col-12 col-md-2 input-group mb-0">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light py-0 px-3">
                        Show
                    </span>
                </div>
                <select name="per_page" class="form-control form-control-sm form-select">
                    @foreach (config('constants.showing_data') as $key => $show)
                        @if(!request('per_page'))
                            <option {{config('constants.default_global_pagination') == $show ? 'selected':''}} value="{{$show}}">{{$show}}</option>
                        @else:
                            <option {{request('per_page') == $show ? 'selected':''}} value="{{$show}}">{{$show}}</option>
                        @endif;
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-1 form-group mb-0">
                <select name="sort_by" class="form-control form-select form-control-sm">
                    <option {{ request('sort_by') == 'newest' ? 'selected':''}} value="newest">Latest</option>
                    <option {{ request('sort_by') == 'oldest' ? 'selected':''}} value="oldest">Oldest</option>
                </select>
            </div>
            <div class="col-12 col-md-1 form-group mb-0">
                <select name="gender" class="form-control form-select form-control-sm">
                    <option {{ empty(request('gender')) ? 'selected':''}} value="">All</option>
                    <option {{ request('gender') == 'male' ? 'selected':''}} value="male">Male</option>
                    <option {{ request('gender') == 'female' ? 'selected':''}} value="female">Female</option>
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="status" class="form-control form-select form-control-sm">
                    <option {{ request('status') == '' ? 'selected':''}} value="">All Status</option>
                    <option {{ request('status') == 'active' ? 'selected':''}} value="active">Active</option>
                    <option {{ request('status') == 'inactive' ? 'selected':''}} value="inactive">Inactive</option>
                    {{-- <option {{ request('status') == 'suspend' ? 'selected':''}} value="suspend">Suspend</option> --}}
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="role" class="form-control form-select select2" data-placeholder="Select Role">
                    <option value="" disabled>Select Role</option>
                    <option {{!request('role') || request('role') == 'all' ? 'selected':''}} value="">All Role</option>
                    @foreach ($roles as $role)
                    <option {{request('role') == $role->name ? 'selected':''}} value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <input type="text" name="keyword" class="form-control form-control-sm" value="{{request('keyword')}}" placeholder="Serarch...">
            </div>
            <div class="col-12 col-md form-group mb-0">
                <button type="submit" class="btn btn-sm btn-outline-primary text-bold">
                    <i class="fas fa-search"></i> Filter
                </button>
                @if(request()->query())
                <a href="{{url('cpanel/user-management/users')}}" class="text-xs text-danger ml-3">Reset Filter</a>
                @endif
            </div>
        </div>
    </form>
</div>

