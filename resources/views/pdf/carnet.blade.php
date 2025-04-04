@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    $datos_estudiante = json_encode([
        'nombre' => strtolower($estudiante->nombre),
        'cedula' => strtolower($estudiante->cedula),
        'carrera' => strtolower($estudiante->carreras->nombre),
    ]);

    $qr_code = base64_encode(QrCode::format('png')->size(90)->generate($datos_estudiante));
@endphp

<!--Frontal-->

{{-- <div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 0px; margin-top: 0px;">
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
</div> --}}

<!--Reverso-->

{{-- <div style="position: absolute; width: 204.10px; height: 323.15px; margin-left: 300px; margin-top: 0px;">
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
</div> --}}


<table style="width: 100%; border-collapse: collapse;">
    <tr>
        <!-- Frontal -->
        <td style="width: 204.10px; height: 323.15px; padding: 0; vertical-align: top;">
            <table style="width: 204.10px; height: 323.15px; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0;">
                        <img src="{{ $ruta_imagen }}" style="width: 204.10px; height: 323.15px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0; text-align: center; height: 120px;">
                        <div style="margin-top: -320px;">
                            <img src="{{ $ruta_imagen_estudiante }}" style="width:90px; height: 120px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0; text-align: center;">
                        <div style="margin-top: -230px; font-family: Arial; font-size: 10px; width: 140px; margin-left: auto; margin-right: auto;">
                            {{ ucwords(strtolower($estudiante->nombre)) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0; text-align: center;">
                        <div style="margin-top: -207px; font-family: Arial; font-size: 10px; width: 140px; margin-left: auto; margin-right: auto;">
                            C.I. {{ number_format($estudiante->cedula, 0, ',', '.') }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0; text-align: center;">
                        <div style="margin-top: -195px; font-family: Arial; font-size: 10px; font-weight: bold; width: 140px; margin-left: auto; margin-right: auto;">
                            {{ strtoupper($estudiante->carreras->nombre) }}
                        </div>
                    </td>
                </tr>
            </table>
        </td>

        <!-- Espacio entre carnet frontal y reverso -->
        <td style="width: 96px;"></td>

        <!-- Reverso -->
        <td style="width: 204.10px; height: 323.15px; padding: 0; vertical-align: top;">
            <table style="width: 204.10px; height: 323.15px; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0;">
                        <img src="{{ $ruta_imagen_reverso }}" style="width: 204.10px; height: 323.15px;">
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0;">
                        <div style="margin-top: -123px; text-align: center;">
                            <img src="data:image/png;base64,{{ $qr_code }}" style="width:90px;">
                            <img src="{{ $ruta_imagen_autoridad_sello }}" style="width:90px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0;">
                        <div style="margin-top: -50px;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="font-family: Arial; font-size: 8px; width:90px; padding-left: 10px;">
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
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>