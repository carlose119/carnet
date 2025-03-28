@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $ruta_public = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('public'));
    $ruta_base = str_replace(DIRECTORY_SEPARATOR . 'app', '', app_path('storage'));
    $ruta_imagen = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $empleado->cargo->imagen_carnet);
    $ruta_imagen_empleado = $ruta_base . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $empleado->imagen);

    $ruta_imagen_reverso = $ruta_public . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR .'reverso.png';
    $ruta_imagen_autoridad_sello = $ruta_base. DIRECTORY_SEPARATOR. 'app'. DIRECTORY_SEPARATOR. 'public'. DIRECTORY_SEPARATOR. str_replace('/', DIRECTORY_SEPARATOR, $autoridad->sello);

    $datos_empleado = json_encode([
        'nombre' => strtolower($empleado->nombre),
        'cedula' => strtolower($empleado->cedula),
        'cargo' => strtolower($empleado->cargo->nombre),
        //'departamento' => strtolower($empleado->departamento->nombre),
    ]);

    $qr_code = base64_encode(QrCode::format('png')->size(90)->generate($datos_empleado));
@endphp

<!--Frontal-->

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 0px; margin-top: 0px;">
    <img src="{{ $ruta_imagen }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="position: absolute; width: 204.10px; margin-top: 65px; text-align: center;">
    <img src="{{ $ruta_imagen_empleado }}" style="width:90px; height: 120px;">
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

<!--Reverso-->

<div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 300px; margin-top: 0px;">
    <img src="{{ $ruta_imagen_reverso }}" style="width: 204.10px; height: 323.15px;">
</div>

<div style="border: 0px solid #000; position: absolute; width: 204.10px; margin-left: 300px; margin-top: 200px; text-align: left; display: flex; justify-content: center; padding-left: 10px;">
    <img src="data:image/png;base64,{{ $qr_code }}" style="width:90px;">
    <img src="{{ $ruta_imagen_autoridad_sello }}" style="width:90px;">
</div>

<div style="border: 0px solid #000; position: absolute; width: 204.10px; margin-left: 300px; margin-top: 270px; text-align: left; display: flex; justify-content: center; padding-left: 10px;">
    <table>
        <tr>
            <td style="font-family: Arial; font-size: 8px; width:90px;">
                Vence {{ date('d-m-Y', strtotime($carnet->fecha_vencimiento)) }}
            </td>
            <td style="font-family: Arial; font-size: 8px; width:90px; text-align: center;">
                {{ $autoridad->nombre }}<br/>
                {{ $autoridad->cargo }}<br/>
                <span style="font-size: 6px;">
                    {{ $autoridad->resolucion }}
                </span>                
            </td>
        </tr>
    </table>
</div>