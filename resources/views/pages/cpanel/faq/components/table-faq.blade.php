<div class="card-body table-responsive p-0" style="max-height:80vh;">
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th scope="col" width="70px">#</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col" class="text-center">Jawaban</th>
                <th scope="col">Status</th>
                <th scope="col" width="150px" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
            <tr>
                <td>{{$faqs->firstItem()+$loop->index}}.</td>
                <td>
                    <b>
                        {{$faq->ask ?? '-'}}
                    </b>
                </td>
                <td>
                    {!!$faq->question ?? '-'!!}
                </td>
                <td>
                    {!!$faq->is_active == 1 ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Non Aktif</span>' !!}
                </td>
                <td class="text-center">
                    <a href="{{route('cpanel.faq.edit', $faq->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                    <a href="{{route('cpanel.faq.delete', $faq->id)}}" class="btn btn-delete btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
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
