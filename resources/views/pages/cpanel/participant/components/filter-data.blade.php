<div class="card-header px-2">
    <h4 class="mb-0 font-weight-bold ml-1">
        <i class="fas fa-layer-group p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>    
        List Participant
    </h4>
</div>
<div class="card-body p-2 pb-0 bg-light">
    <form method="GET">
        <div class="row">
            <div class="col-12 col-md-2 input-group input-group-sm mb-0">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light py-0 px-3">
                        Show
                    </span>
                </div>
                <select name="per_page" class="form-control form-select">
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
                <select name="sort_by" class="form-control form-select select2">
                    <option {{ request('sort_by') == 'newest' ? 'selected':''}} value="newest">Latest</option>
                    <option {{ request('sort_by') == 'oldest' ? 'selected':''}} value="oldest">Oldest</option>
                </select>
            </div>
            <div class="col-12 col-md-1 form-group mb-0">
                <select name="gender" class="form-control form-select select2">
                    <option {{ request('gender') == '' ? 'selected':''}} value="">All</option>
                    <option {{ request('gender') == 'male' ? 'selected':''}} value="male">Male</option>
                    <option {{ request('gender') == 'female' ? 'selected':''}} value="female">Female</option>
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="category" class="form-control form-select select2" data-placeholder="Select Category">
                    <option value="" disabled>Select Category</option>
                    <option {{!request('category') || request('category') == 'all' ? 'selected':''}} value="all">All Category</option>
                    @foreach ($categories as $category)
                    <option {{request('category') == $category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <select name="sub_category" class="form-control form-select select2" data-placeholder="Select Sub Category">
                    <option value="" disabled>Select Sub Category</option>
                    <option {{!request('sub_category') || request('sub_category') == 'all' ? 'selected':''}} value="all">All Sub Category</option>
                    @foreach ($sub_categories as $category)
                    <option {{request('sub_category') == $category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-2 form-group mb-0">
                <input type="text" name="keyword" class="form-control form-control-sm" value="{{request('keyword')}}" placeholder="Search....">
            </div>
            <div class="col-12 col-md form-group mb-0">
                <button type="submit" class="btn btn-sm btn-outline-primary text-bold">
                    <i class="fas fa-search"></i> Filter
                </button>
                @if(request()->query())
                <a href="{{route('cpanel.participant.list')}}" class="text-xs text-danger ml-3">Reset Filter</a>
                @endif
            </div>
        </div>
    </form>
</div>

