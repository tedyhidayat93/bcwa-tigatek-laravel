<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Created at</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td width="50">{{$categories->firstItem()+$loop->index}}.</td>
                <td>
                    {{$category->name ?? '-'}}
                </td>
                <td>
                    <ul class="pl-3">
                        @foreach ($category->sub_categories as $sub_category)
                        <li class="">
                            {{$sub_category->name}}
                        </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{ date('d/m/Y', strtotime($category->created_at))}}
                </td>
                <td class="text-center">
                    @can('update participant category')
                    <a href="{{route('cpanel.participant.category.edit', $category->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    @endcan
                    @can('delete participant category')
                    <a href="{{route('cpanel.participant.category.delete', $category->id)}}"
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
