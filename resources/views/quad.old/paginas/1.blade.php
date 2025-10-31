<img src="{{ asset('img/brain/portada.png') }}" style="top: 10mm; left: 0px; width: 240mm; height: 320mm; opacity: 90;">
<div class="texto-encima">
    <div class="fs-xl text-white keep-print-font pt-1 l-h-n m-0">
        Desarrollado para :
    </div>
    <div class="fs-xxl fw-900 text-white keep-print-font pt-1 l-h-n m-0">
        {{ $evaluacion->nombre . ' ' . $evaluacion->apellido}}
    </div>
    <div class="fs-xl fw-900 text-white keep-print-font pt-1 l-h-n m-0">
        Fecha Emisión: {{ $fecha}}
    </div>
</div>




