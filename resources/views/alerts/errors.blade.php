@if(count($errors) > 0)

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error: </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
    </button>
    @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach

</div>

{{-- <div class="alert bg-danger-600 alert-dismissible fade show">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-times"></i></span>
    </button>
    <div class="d-flex align-items-center">
        <div class="alert-icon width-8">
            <span class="icon-stack icon-stack-xl">
                <i class="base-5 icon-stack-3x color-danger-400"></i>
                <i class="fas fa-frown text-white icon-stack-2x"></i>
            </span>
        </div>
        <div class="flex-1 pl-1">
            <span class="h2">
                Error en la operación
            </span>
            <br>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
</div> --}}
@endif




