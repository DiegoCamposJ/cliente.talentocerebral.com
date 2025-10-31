@if($campana->empresa_id == 27)
    <img id="portadarep" src="{{ asset('img/neuros/portada.png') }}" style="top: 10mm; left: 0px; width: 240mm; height: 320mm; opacity: 90;">
    <div class="texto-portada-neuros">
        <div class="fs-xl text-black keep-print-font pt-1 l-h-n m-0">
            Desarrollado para :
        </div>
        <div class="fs-xxl fw-900 text-black keep-print-font pt-1 l-h-n m-0">
            {{ $evaluacion->nombre . ' ' . $evaluacion->apellido}}
        </div>
        <div class="fs-xl fw-900 text-black keep-print-font pt-1 l-h-n m-0">
            Fecha Emisión: {{ $fecha}}
        </div>
    </div>
@else
    <img id="portadarep" src="{{ asset('img/brain/portada.png') }}" style="top: 5mm; left: -5mm; width: 220mm; height: 320mm; opacity: 90;">
    <div class="texto-portada">
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
@endif







