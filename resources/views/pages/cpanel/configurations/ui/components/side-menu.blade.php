<div class="card">
    <div class="card-header bg-custom-1">
        <h4 class="card-title">Setting</h4>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-fw text-white fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{route('cpanel.settings.ui.slider.list')}}" class="nav-link {{request()->segment(2) == 'settings' && request()->segment(3) == 'ui' && request()->segment(4) == 'slider' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-images"></i> Homepage Sliders
                </a>
            </li>
        </ul>
    </div>

</div>