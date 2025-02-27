<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraResource\Pages;
use App\Filament\Resources\CarreraResource\RelationManagers;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarreraResource extends Resource
{
    protected static ?string $model = Carrera::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('area_id')
                    ->relationship(name: 'areas', titleAttribute: 'nombre')
                    ->required()
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                /* Forms\Components\FileUpload::make('imagen_carnet')
                    ->image()
                    ->directory('carreras')
                    ->required(), */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('areas.nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                /* Tables\Columns\ImageColumn::make('imagen_carnet')
                    ->searchable(), */
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarreras::route('/'),
            'create' => Pages\CreateCarrera::route('/create'),
            'edit' => Pages\EditCarrera::route('/{record}/edit'),
        ];
    }
}
