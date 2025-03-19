<?php

namespace App\Filament\Widgets;

use App\Models\Area;
use App\Models\Carrera;
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
        return [
            Stat::make('Áreas', number_format($totalAreas, 0, ',', '.')),
            Stat::make('Carreras', number_format($totalCarreras, 0, ',', '.')),
            Stat::make('Estudiantes', number_format($totalEstudiantes, 0, ',', '.')),
        ];
    }
}
