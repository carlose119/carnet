@php
    $ruta_base = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('storage'));
    $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->carreras->areas->imagen_carnet);
    //$url_imagen = url('storage/' . $estudiante->carreras->areas->imagen_carnet);

    $ruta_imagen_estudiante = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->imagen);
@endphp

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 0px; margin-top: 0px;">
    <img src="{{ $ruta_imagen }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="position: absolute; width: 204.10px; margin-top: 65px; text-align: center;">
    <img src="{{ $ruta_imagen_estudiante }}">
</div>

<div style="position: absolute; width: 80px; font-family: Arial; margin-left: 60px; margin-top: 190px; font-size: 10px; text-align: center;">
    {{ ucwords(strtolower($estudiante->nombre)) }}
</div>

<div style="position: absolute; width: 204.10px; font-family: Arial; margin-top: 210px; font-size: 10px; text-align: center;">
    {{ $estudiante->cedula }}
</div>

<div style="position: absolute; width: 80px; font-family: Arial; margin-left: 60px; margin-top: 225px; font-size: 10px; text-align: center; font-weight: bold;">
    {{ strtoupper($estudiante->carreras->nombre) }}
</div>