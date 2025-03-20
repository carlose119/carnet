<?php

namespace App\Filament\Resources\CarnetResource\Pages;

use App\Filament\Resources\CarnetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarnets extends ListRecords
{
    protected static string $resource = CarnetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
