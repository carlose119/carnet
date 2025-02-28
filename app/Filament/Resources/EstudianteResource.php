<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudianteResource\Pages;
use App\Filament\Resources\EstudianteResource\RelationManagers;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;
use Torgodly\Html2Media\Tables\Actions\Html2MediaAction;

class EstudianteResource extends Resource
{
    protected static ?string $model = Estudiante::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('carrera_id')
                    ->relationship(name: 'carreras', titleAttribute: 'nombre')
                    ->required()
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('cedula')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parroquia')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        /* $user = auth('web')->user();
        dd($user); */
        return $table
            ->columns([                
                Tables\Columns\TextColumn::make('cedula')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parroquia')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('carreras.nombre')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Html2MediaAction::make('Carnet')
                    ->filename(fn($record) => "carnet-{$record->cedula}.pdf")
                    ->content(function ($record) {
                        return view('pdf.carnet', ['estudiante' => $record]);
                    })
                    ->scale(20)
                    ->print() // Enable print option
                    //->preview() // Enable preview option
                    ->pagebreak('section', ['css', 'legacy'])
                    ->orientation('portrait') // Portrait orientation
                    ->format('a4', 'mm') // A4 format with mm units
                    ->enableLinks() // Enable links in PDF
                    ->margin([50, 50, 50, 50]) 
                    ->requiresConfirmation()
                    ->savePdf(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    //ExportBulkAction::make(),
                    ExportBulkAction::make()->exports([
                        //ExcelExport::make('table')->fromTable()->askForWriterType(),
                        ExcelExport::make()->withColumns([
                            Column::make('cedula')->heading('CEDULA'),
                            Column::make('nombre')->heading('NOMBRE'),
                            Column::make('parroquia')->heading('PARROQUIA'),
                            Column::make('carreras.nombre')->heading('CARRERA'),
                        ]),
                    ]),                    
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstudiantes::route('/'),
            'create' => Pages\CreateEstudiante::route('/create'),
            'edit' => Pages\EditEstudiante::route('/{record}/edit'),
        ];
    }
}
