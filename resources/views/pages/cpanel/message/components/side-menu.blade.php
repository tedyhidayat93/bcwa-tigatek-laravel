<div class="d-block d-md-flex align-items-center">
    @can('view message')
    <a href="{{route('cpanel.message.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'message' && request()->segment(3) == 'list' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'message' && request()->segment(3) == 'list' ? '-open':''}}"></i> Message
    </a>
    @endcan

    @can('view message type')
    <a href="{{route('cpanel.message.type.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'message' && request()->segment(3) == 'type' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'message' && request()->segment(3) == 'type' ? '-open':''}}"></i> Master Subject
    </a>
    @endcan
</div>
