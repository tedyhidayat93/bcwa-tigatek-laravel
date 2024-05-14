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
                    <i class="fas fa-fw fa-cog"></i> General
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('cpanel.settings.system.list', ['group' => 'MEDIZINE'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'MEDIZINE' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> Medizine
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('cpanel.settings.system.list', ['group' => 'MAIL_SENDER'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'MAIL_SENDER' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> SMTP Email Sender
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('cpanel.settings.system.list', ['group' => 'WA_BLAST'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'WA_BLAST' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> WhatsApp Blast
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('cpanel.settings.system.list', ['group' => 'PAYMENT_GATEWAY'])}}" class="nav-link {{request()->segment(2) == 'settings' && request()->get('group') == 'PAYMENT_GATEWAY' ? 'text-warning':''}}">
                    <i class="fas fa-fw fa-cog"></i> Payment Gateway
                </a>
            </li>
        </ul>
    </div>

</div>