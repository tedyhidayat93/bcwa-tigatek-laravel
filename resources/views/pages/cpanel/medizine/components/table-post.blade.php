<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Title</th>
                {{-- <th scope="col">Created By</th> --}}
                <th scope="col">Authors</th>
                <th scope="col">Status</th>
                <th scope="col">Code</th>
                <th scope="col">Type</th>
                <th scope="col">Created at</th>
                <th scope="col" class="text-center">Visitors</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{$posts->firstItem()+$loop->index}}.</td>
                <td>
                    @if($post->is_highlight == 1)
                    <i class="fas fa-star text-warning" title="Article Highlight"></i>
                    @else
                    <i class="fas fa-star text-gray" title="Article Not Highlight"></i>
                    @endif
                </td>
                <td>
                    <span class="text-bold">{{ Str::limit($post->title, 45, '...') }}</span>
                    <br>
                    <a target="_blank" href="{{url('medizine/'.$post->type->slug.'/'. $post->slug)}}" class="text-xs text-primary">
                        {{ Str::limit(url('medizine/'.$post->type->slug.'/'. $post->slug), 45, '...')}}
                    </a>
                </td>
                {{-- <td>
                    <div class="d-flex align-items-center">
                        <div class="tbl-img bg-light border" style="width: 20px !important; height:20px !important;">
                            @php
                                switch (true) {
                                    case (empty($post->creator->avatar) && $post->creator->gender == 'male'):
                                    $avatar = config('constants.default_ava_male');
                                    break;
                                    case (empty($post->creator->avatar) && $post->creator->gender == 'female'):
                                        $avatar = config('constants.default_ava_female');
                                        break;
                                        case (!empty($post->creator->avatar)):
                                        $avatar = asset('uploads/users/avatars/thumb/'.$post->creator->avatar);
                                        break;
                                        default:
                                        $avatar = config('constants.default_ava');
                                        break;
                                    }
                                    @endphp
                            <img src="{{ $avatar }}" alt="{{$post->creator->name}}">
                        </div>
                        <small class="ml-2">{{$post->creator->name}}</small>
                    </div>
                </td> --}}
                <td>
                    @foreach ($post->authors as $author)
                        <div class="d-flex align-items-center mb-1">
                            <div class="tbl-img bg-light border" style="width: 20px !important; height:20px !important;">
                                @php
                                    switch (true) {
                                        case (empty($author->user->avatar) && $author->user->gender == 'male'):
                                        $avatar = config('constants.default_ava_male');
                                        break;
                                        case (empty($author->user->avatar) && $author->user->gender == 'female'):
                                            $avatar = config('constants.default_ava_female');
                                            break;
                                            case (!empty($author->user->avatar)):
                                            $avatar = asset('uploads/users/avatars/thumb/'.$author->user->avatar);
                                            break;
                                            default:
                                            $avatar = config('constants.default_ava');
                                            break;
                                        }
                                        @endphp
                                <img src="{{ $avatar }}" alt="{{$author->user->name}}">
                            </div>
                            <small class="ml-2">{{$author->user->name}}</small>
                        </div>
                    @endforeach
                </td>
                <td>
                    {!!$post->is_publish == 1 ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-warning">Pending</span>' !!}
                </td>
                <td>
                    {{$post->code ?? '-'}}
                </td>
                <td>
                    {{$post->type->code ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($post->created_at))}}
                </td>
                <td class="text-md font-weight-bold text-center">
                    {{$post->visitor ?? 0}}
                </td>
                <td class="text-center">
                    @can('update article')
                    <a href="{{route('cpanel.medizine.edit', $post->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan

                    @can('delete article')
                    <a href="{{route('cpanel.medizine.delete', $post->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
