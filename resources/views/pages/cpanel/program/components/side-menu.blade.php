<div class="d-block d-md-flex align-items-center">
    @can('view program')
    <a href="{{route('cpanel.program.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'program' && request()->segment(3) == 'list' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'program' && request()->segment(3) == 'list' ? '-open':''}}"></i> Program
    </a>
    @endcan

    {{-- @can('view program type')
    <a href="{{route('cpanel.program.type.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'program' && request()->segment(3) == 'type' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'program' && request()->segment(3) == 'type' ? '-open':''}}"></i> Type
    </a>
    @endcan --}}
</div>
