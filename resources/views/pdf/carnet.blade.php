@php
    $url_imagen = url('storage/' . $estudiante->carreras->areas->imagen_carnet);
@endphp
<img src="{{ $url_imagen }}">