<div class="d-block d-md-flex align-items-center">
    @can('view article')
    <a href="{{route('cpanel.medizine.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'medizine' && request()->segment(3) == 'list' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'medizine' && request()->segment(3) == 'list' ? '-open':''}}"></i> Article
    </a>
    @endcan

    @can('view article type')
    <a href="{{route('cpanel.medizine.type.list')}}" class="mr-1 btn btn-{{request()->segment(2) == 'medizine' && request()->segment(3) == 'type' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'medizine' && request()->segment(3) == 'type' ? '-open':''}}"></i> Type
    </a>
    @endcan

    @can('view article category')
    <a href="{{route('cpanel.medizine.category.list')}}" class="btn btn-{{request()->segment(2) == 'medizine' && request()->segment(3) == 'category' ? 'dark':'light'}} mb-1">
        <i class="far fa-fw fa-folder{{request()->segment(2) == 'medizine' && request()->segment(3) == 'category' ? '-open':''}}"></i> Categories
    </a>
    @endcan
</div>
