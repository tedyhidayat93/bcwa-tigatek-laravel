<div class="card-footer p-0">
    <div class="mailbox-controls">

        <div class="d-block d-md-flex align-items-center justify-content-between px-3">
            {!! $users->appends(request()->query())->links('components.cpanel.pagination') !!}
        </div>

    </div>
</div>