@if(Session::has('message-error'))
<div class="alert border-faded bg-transparent text-secondary fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-times"></i></span>
    </button>
    <div class="d-flex align-items-center">
        <div class="alert-icon">
            <span class="icon-stack icon-stack-md">
                <i class="base-7 icon-stack-3x color-warning-600"></i>
                <i class="fal fal fa-times-circle icon-stack-1x text-white"></i>
            </span>
        </div>
        <div class="flex-1">
            <span class="h5 color-success-600">Advertencia</span>
            <br>
            {{ Session::get('message-error') }}
        </div>
    </div>
</div>
@endif
