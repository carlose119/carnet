<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarnetResource\Pages;
use App\Filament\Resources\CarnetResource\RelationManagers;
use App\Models\Carnet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class CarnetResource extends Resource
{
    protected static ?string $model = Carnet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('estudiante_id')
                    ->relationship('estudiante', 'id')
                    ->default(null),
                Forms\Components\Select::make('empleado_id')
                    ->relationship('empleado', 'id')
                    ->default(null),
                Forms\Components\Select::make('autoridad_id')
                    ->relationship('autoridad', 'id')
                    ->default(null),
                Forms\Components\DatePicker::make('fecha_emision'),
                Forms\Components\DatePicker::make('fecha_vencimiento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('estudiante.cedula')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('empleado.cedula')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('autoridad.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_emision')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
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
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                /* Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]), */
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
            'index' => Pages\ListCarnets::route('/'),
            'create' => Pages\CreateCarnet::route('/create'),
            'edit' => Pages\EditCarnet::route('/{record}/edit'),
        ];
    }
}
