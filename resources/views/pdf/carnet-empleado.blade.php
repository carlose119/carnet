@php
    $ruta_base = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('storage'));
    $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $empleado->cargo->imagen_carnet);
    $ruta_imagen_estudiante = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $empleado->imagen);
@endphp

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 0px; margin-top: 0px;">
    <img src="{{ $ruta_imagen }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="position: absolute; width: 204.10px; margin-top: 65px; text-align: center;">
    <img src="{{ $ruta_imagen_estudiante }}" style="width:90px; height: 120px;">
</div>

<div style="position: absolute; font-family: Arial; margin-top: 215px; font-size: 12px; width: 160px; text-align: center; padding-left: 10px; padding-right: 10px;">
    {{ ucwords(strtolower($empleado->nombre)) }}
</div>

<div style="position: absolute; font-family: Arial; margin-top: 235px; font-size: 12px; width: 160px; text-align: center; padding-left: 10px; padding-right: 10px;">
    C.I. {{ number_format($empleado->cedula, 0, ',', '.') }}
</div>

<div style="position: absolute; font-family: Arial; margin-top: 267px; font-size: 11px; text-align: center; font-weight: bold; width: 150px; padding-left: 10px; padding-right: 10px;">
    {{ ($empleado->departamento->nombre) }}
</div>

<div style="position: absolute; font-family: Arial; margin-top: 305px; font-size: 12px; text-align: center; font-weight: bold; width: 150px; padding-left: 10px; padding-right: 10px;">
    {{ strtoupper($empleado->cargo->nombre) }}
</div>