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
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="action" class="form-control form-select form-control-sm">
                    <option {{ empty(request('action')) ? 'selected':''}} value="">All Action</option>
                    <option {{ request('action') == 'login' ? 'selected':''}} value="login">login</option>
                    <option {{ request('action') == 'logout' ? 'selected':''}} value="logout">logout</option>
                    <option {{ request('action') == 'read' ? 'selected':''}} value="read">read</option>
                    <option {{ request('action') == 'create' ? 'selected':''}} value="create">create</option>
                    <option {{ request('action') == 'update' ? 'selected':''}} value="update">update</option>
                    <option {{ request('action') == 'delete' ? 'selected':''}} value="delete">delete</option>
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="user" class="form-control form-select select2" data-placeholder="Select User">
                    <option value="" disabled>Select User</option>
                    <option {{empty(request('user')) ? 'selected':''}} value="">All user</option>
                    @foreach ($users as $user)
                    <option {{request('user') == $user->id ? 'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3 form-group mb-0">
                <input type="text" name="keyword" class="form-control form-control-sm" value="{{request('keyword')}}" placeholder="Serarch...">
            </div>
            <div class="col-12 col-md form-group mb-0">
                <button type="submit" class="btn btn-sm btn-outline-primary text-bold">
                    <i class="fas fa-search"></i> Filter
                </button>
                @if(request()->query())
                <a href="{{url('cpanel/user-management/logs')}}" class="text-xs text-danger ml-3">Reset Filter</a>
                @endif
            </div>
        </div>
    </form>
</div>

