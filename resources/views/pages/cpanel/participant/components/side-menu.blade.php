<div class="d-block d-md-flex align-items-center">
    @can('view participant')
    <a href="{{route('cpanel.participant.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'participant' && request()->segment(3) == 'list' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'participant' && request()->segment(3) == 'list' ? '-open':''}}"></i> List Participant
    </a>
    @endcan

    @can('view participant type')
    <a href="{{route('cpanel.participant.type.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'participant' && request()->segment(3) == 'type' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'participant' && request()->segment(3) == 'type' ? '-open':''}}"></i> Type
    </a>
    @endcan

    @can('view participant category')
    <a href="{{route('cpanel.participant.category.list')}}" class="btn btn-{{request()->segment(2) == 'participant' && request()->segment(3) == 'category' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'participant' && request()->segment(3) == 'category' ? '-open':''}}"></i> Categories
    </a>
    @endcan
</div>
