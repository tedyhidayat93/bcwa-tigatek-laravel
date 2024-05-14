<div class="content-header bg-light shadow-sm" style="margin-top: -10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-10">
                <h1 class="text-lg font-weight-bold">Medizine</h1>
                @if(request()->segment(2) == 'medizine' && request()->segment(3) != 'type')
                <span class="mb-0">Article</span>
                @elseif(request()->segment(2) == 'medizine' && request()->segment(3) == 'type')
                <span class="mb-0">Medizine Type</span>
                @endif
            </div>
            <div class="col-6 col-md-2 d-flex align-items-center justify-content-end">
            </div>
        </div>
    </div>
</div>