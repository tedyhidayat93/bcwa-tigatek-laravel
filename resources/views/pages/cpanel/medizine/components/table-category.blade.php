<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover/Icon</th>
                <th>Code</th>
                <th>Category</th>
                <th>Parent Type</th>
                <th>Created at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td width="50">{{$categories->firstItem()+$loop->index}}.</td>
                <td>    
                    @if($category->icon)
                    <img src="{{asset('uploads/post_categories/thumb/'.$category->icon)}}"
                        class="img-thumbnail" style="height: 60px;">
                    @endif  
                </td>
                <td>
                    {{$category->code ?? '-'}}
                </td>
                <td>
                    {{$category->name ?? '-'}}
                </td>
                <td>
                    {{$category->category->name ?? '-'}}
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($category->created_at))}}
                </td>
                <td class="text-center">
                    @can('update article category')
                    <a href="{{route('cpanel.medizine.category.edit', $category->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete article category')
                    <a href="{{route('cpanel.medizine.category.delete', $category->id)}}"
                        class="btn-delete btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-5 bg-white">
                    <img src="{{asset('assets/images/notfound-search.svg')}}" class="w-25 mb-3">
                    <br>
                    {{config('constants.notfound_data_message')}}
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
