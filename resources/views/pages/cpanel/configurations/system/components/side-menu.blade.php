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
                <a href="{{route('cpanel.settings.system.list', ['group' => 'GENERAL_PROFILE'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'GENERAL_PROFILE' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> Pengaturan Umum
                </a>
            </li>
            <li class="nav-item d-none">
                <a href="{{route('cpanel.settings.system.list', ['group' => 'MAIL_SENDER'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'MAIL_SENDER' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> SMTP Email Sender
                </a>
            </li>
        </ul>
    </div>

</div>