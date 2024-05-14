<div class="card-header overflow-auto px-2">
    <div class="row">
        <div class="col-12 col-sm-4 d-flex align-items-center">
            <h4 class="mb-0 font-weight-bold ml-1">
                <i class="fas fa-layer-group p-1 bg-teal shadow-sm rounded mr-1" style="font-size:16px;"></i>    
                List Article
            </h4>
        </div>
        <div class="col-12 col-sm-8 d-flex align-items-center justify-content-md-end w-100">
            @if(request()->query())
                <a href="{{route('cpanel.medizine.list')}}" class="text-danger ml-3"><i class="fas fa-times"></i> Reset Filter</a>
            @endif
            <div class="border h-50 mx-3" style="width: 2px;"></div>
            <button type="button" class="btn btn-success btn-light text-gray" data-toggle="collapse" data-target="#collapse-filter" aria-expanded="false" aria-controls="collapse-filter">
                <i class="fas fa-filter"></i> Filter
            </button>
            <div class="border h-50 mx-3" style="width: 2px;"></div>

            {{-- ?status=&filter=show&per_page=10&sort_by=newest&date=&creator=1&type=all&category=all&keyword= --}}
            <div class="d-flex align-items-center">
                <a href="{{url('cpanel/medizine/list?status=&filter='.request('filter').'&per_page='.request('per_page').'&sort_by='.request('sort_by').'&date='.request('date').'&creator='.request('creator').'&type='.request('type').'&category='.request('category').'&keyword='.request('keyword').'&status=')}}" class="d-flex align-items-center btn btn-{{!request()->query() || empty(request()->get('status')) ? '':'outline-'}}dark my-0 btn-sm mr-2">
                    <i class="fas fa-fw fa-clock"></i> All
                    <span class="badge bg-light shdaow-sm ml-3 text-md">
                        {{$total_posts['all']}}
                    </span>
                </a>
                <a href="{{url('cpanel/medizine/list?status=&filter='.request('filter').'&per_page='.request('per_page').'&sort_by='.request('sort_by').'&date='.request('date').'&creator='.request('creator').'&type='.request('type').'&category='.request('category').'&keyword='.request('keyword').'&status=pending')}}" class="d-flex align-items-center btn btn-{{request()->get('status') == 'pending' ? '':'outline-'}}warning my-0 btn-sm mr-2">
                    <i class="fas fa-fw fa-clock"></i> Pending
                    <span class="badge bg-warning shdaow-sm ml-3 text-md">
                        {{$total_posts['pending']}}
                    </span>
                </a>
                <a href="{{url('cpanel/medizine/list?status=&filter='.request('filter').'&per_page='.request('per_page').'&sort_by='.request('sort_by').'&date='.request('date').'&creator='.request('creator').'&type='.request('type').'&category='.request('category').'&keyword='.request('keyword').'&status=publish')}}" class="d-flex align-items-center btn btn-{{request()->get('status') == 'publish' ? '':'outline-'}}success my-0 btn-sm">
                    <i class="fas fa-fw fa-check"></i> Published
                    <span class="badge bg-success shdaow-sm ml-3 text-md">
                        {{$total_posts['published']}}
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card-body p-2 p-md-4 bg-custom-1 collapse {{request()->query('filter') == 'show' ? 'show':''}}" id="collapse-filter">
    <form method="GET">
        <input type="hidden" name="status" value="{{request()->get('status')}}">
        <input type="hidden" name="filter" value="show">
        <div class="row">
            <div class="col-12 col-md-2 form-group">
                <label>Showing Data</label>
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
            <div class="col-12 col-md-2 form-group">
                <label>Sorting By</label>
                <select name="sort_by" class="form-control form-select select2">
                    <option {{ request('sort_by') == 'newest' ? 'selected':''}} value="newest">Latest</option>
                    <option {{ request('sort_by') == 'oldest' ? 'selected':''}} value="oldest">Oldest</option>
                    <option {{ request('sort_by') == 'hits' ? 'selected':''}} value="hits">Top Hits</option>
                </select>
            </div>
            <div class="col-12 col-md-2 form-group">
                <label>Date Created</label>
                <input type="text" name="date" class="form-control form-control-sm date-range-picker" value="{{request()->query('date')}}" placeholder="Start Date - To Date">
            </div>

            @if(auth()->user()->hasAnyRole(['super-admin', 'admin']))
            <div class="col-12 col-md-6 form-group">
                <label>Author</label>
                <select name="creator" class="form-control form-select select2" data-placeholder="Select Creator">
                    <option value="" disabled>Select Creator</option>
                    <option {{!request('creator') || request('creator') == 'all' ? 'selected':''}} value="all">All</option>
                    @foreach ($creators as $creator)
                    @php
                        switch (true) {
                            case (empty($creator->avatar) && $creator->gender == 'male'):
                                $avatar = config('constants.default_ava_male');
                                break;
                            case (empty($creator->avatar) && $creator->gender == 'female'):
                                $avatar = config('constants.default_ava_female');
                                break;
                            case (!empty($creator->avatar)):
                                $avatar = asset('uploads/users/avatars/thumb/'.$creator->avatar);
                                break;
                            default:
                                $avatar = config('constants.default_ava');
                                break;
                        }
                    @endphp
                    <option data-thumbnail="{{$avatar}}" {{request('creator') == $creator->id ? 'selected':''}} value="{{$creator->id}}">
                        {{$creator->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="col-12 col-md-2 form-group">
                <label>Type</label>
                <select name="type" class="form-control form-select select2" data-placeholder="Select Type">
                    <option value="" disabled>Select Type</option>
                    @foreach ($types as $type)
                    <option {{request('type') == $type->code ? 'selected':''}} value="{{$type->code}}">[{{$type->code}}] {{$type->name}}</option>
                    @endforeach
                    <option {{!request('type') || request('type') == 'all' ? 'selected':''}} value="all">All Type</option>
                </select>
            </div>
            <div class="col-12 col-md-4 form-group">
                <label>Category</label>
                <select name="category" class="form-control form-select select2" data-placeholder="Select Category">
                    <option value="" disabled>Select Category</option>
                    <option {{!request('category') || request('category') == 'all' ? 'selected':''}} value="all">All</option>
                    @foreach ($categories as $category)
                    <option {{request('category') == $category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col form-group">
                <label>Keyword</label>
                <input type="text" name="keyword" class="form-control form-control-sm" value="{{request('keyword')}}" placeholder="Search Anything....">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md form-group">
                <button type="submit" class="btn btn-warning text-bold float-right">
                    <i class="fas fa-search fa-fw"></i> Apply Filter
                </button>
            </div>
        </div>
    </form>
</div>
{{-- 

@section('scripts')
    <script>
        $(".filter-authors").select2({
            templateResult: formatState,
            // templateSelection: formatState,
            data: options,
            minimumResultsForSearch: Infinity
        });

        var options = [
            { id: 'https://example.com/image1.jpg', text: 'Option 1' },
            { id: 'https://example.com/image2.jpg', text: 'Option 2' },
            { id: 'https://example.com/image3.jpg', text: 'Option 3' }
        ];

        function formatState (option) {
            if (!option.id) {
                return option.text;
            }

            var optionWithImage = $(
                '<span><img src="' + option.id + '" class="img-flag" /> ' + option.text + '</span>'
            );
            return optionWithImage;
        };

    </script>
@endsection --}}