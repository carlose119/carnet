<?php

namespace App\Imports;

use App\Models\Carrera;
use App\Models\Estudiante;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudiantesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $carrera = Carrera::where('nombre',$row['carreras'])->first();
            if ($carrera) {
                $exite = Estudiante::where('cedula',$row['cedula'])->first();
                if ($exite) {
                    continue;
                }
                $estudiante = new Estudiante();
                $estudiante->carrera_id = $carrera->id;
                $estudiante->cedula = $row['cedula'];
                $estudiante->nombre = $row['nombre'];
                $estudiante->parroquia = $row['parroquia'];
                $estudiante->save();
            }
        }
    }
}
