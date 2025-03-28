<?php

namespace App\Filament\Widgets;

use App\Models\Area;
use App\Models\Carnet;
use App\Models\Carrera;
use App\Models\Empleado;
use App\Models\Estudiante;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Cantidades extends BaseWidget
{
    protected function getStats(): array
    {
        $totalAreas = Area::all()->count();
        $totalCarreras = Carrera::all()->count();
        $totalEstudiantes = Estudiante::all()->count();
        $totalEstudiantesPregrado = Estudiante::join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')->where('tipo', '=', 'Pregrado')->count();
        $totalEstudiantesPosgrado = Estudiante::join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')->where('tipo', '=', 'Posgrado')->count();
        $totalEstudiantesPnf = Estudiante::join('carreras', 'estudiantes.carrera_id', '=', 'carreras.id')->where('tipo', '=', 'Educación continua')->count();
        $totalEmpleados = Empleado::all()->count();
        $totalCarnets = Carnet::all()->count();
        return [
            Stat::make('Áreas', number_format($totalAreas, 0, ',', '.')),
            Stat::make('Carreras', number_format($totalCarreras, 0, ',', '.')),
            Stat::make('Estudiantes', number_format($totalEstudiantes, 0, ',', '.')),
            Stat::make('Estudiantes Pregrado', number_format($totalEstudiantesPregrado, 0, ',', '.')),
            Stat::make('Estudiantes Posgrado', number_format($totalEstudiantesPosgrado, 0, ',', '.')),
            Stat::make('Estudiantes Educación continua', number_format($totalEstudiantesPnf, 0, ',', '.')),
            Stat::make('Empleados', number_format($totalEmpleados, 0, ',', '.')),
            Stat::make('Carnet Emitidos', number_format($totalCarnets, 0, ',', '.')),
        ];
    }
}
