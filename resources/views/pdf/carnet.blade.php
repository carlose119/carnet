@php
    $ruta_base = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('storage'));
    $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->carreras->areas->imagen_carnet);
    //$url_imagen = url('storage/' . $estudiante->carreras->areas->imagen_carnet);

    if ($estudiante->carreras->imagen_carnet) {
        $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->carreras->imagen_carnet);
    }

    $ruta_imagen_estudiante = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->imagen);
@endphp

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 0px; margin-top: 0px;">
    <img src="{{ $ruta_imagen }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="position: absolute; width: 204.10px; margin-top: 65px; text-align: center;">
    <img src="{{ $ruta_imagen_estudiante }}" style="width:90px; height: 120px;">
</div>

<div style="position: absolute; font-family: Arial; margin-top: 215px; font-size: 10px; width: 170px; text-align: center; padding-left: 10px; padding-right: 10px;">
    {{ ucwords(strtolower($estudiante->nombre)) }}
</div>

<div style="position: absolute; font-family: Arial; margin-top: 235px; font-size: 10px; width: 170px; text-align: center; padding-left: 10px; padding-right: 10px;">
    C.I. {{ number_format($estudiante->cedula, 0, ',', '.') }}
</div>

<div style="position: absolute; font-family: Arial; margin-top: 250px; font-size: 10px; text-align: center; font-weight: bold; width: 170px; padding-left: 10px; padding-right: 10px;">
    {{ strtoupper($estudiante->carreras->nombre) }}
</div>