@php
    $ruta_public = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('public'));
    $ruta_base = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('storage'));
    $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->carreras->areas->imagen_carnet);
    //$url_imagen = url('storage/' . $estudiante->carreras->areas->imagen_carnet);

    if ($estudiante->carreras->imagen_carnet) {
        $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->carreras->imagen_carnet);
    }

    $ruta_imagen_reverso = $ruta_public . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR .'reverso.png';

    $ruta_imagen_estudiante = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $estudiante->imagen);

    $ruta_imagen_autoridad_sello = $ruta_base. DIRECTORY_SEPARATOR. 'app'. DIRECTORY_SEPARATOR. 'public'. DIRECTORY_SEPARATOR. str_replace('/', DIRECTORY_SEPARATOR, $autoridad->sello);
@endphp

<!--Frontal-->

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

<!--Reverso-->

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 300px; margin-top: 0px;">
    <img src="{{ $ruta_imagen_reverso }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="border: 0px solid #000; position: absolute; width: 204.10px; margin-left: 300px; margin-top: 200px; text-align: left; display: flex; justify-content: center; padding-left: 10px;">
    <img src="{{ $ruta_imagen_autoridad_sello }}" style="width:90px;">
    <img src="{{ $ruta_imagen_autoridad_sello }}" style="width:90px;">
</div>

{{-- <div style="border: 1px solid #000; position: absolute; width: 204.10px; margin-left: 310px; margin-top: 200px; text-align: right;">
    <img src="{{ $ruta_imagen_autoridad_sello }}" style="width:90px;">
</div> --}}