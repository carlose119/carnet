<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutoridadResource\Pages;
use App\Filament\Resources\AutoridadResource\RelationManagers;
use App\Models\Autoridad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class AutoridadResource extends Resource
{
    protected static ?string $model = Autoridad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Autoridades';

    protected static ?string $modelLabel = 'Autoridad';

    protected static ?string $breadcrumb = 'Autoridades';

    protected static ?string $navigationLabel = 'Autoridades';

    protected static ?string $pluralLabel = 'Autoridades';

    protected static ?string $slug = 'autoridades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->maxLength(100)
                    ->required()
                    ->default(null),
                Forms\Components\TextInput::make('cedula')
                    ->maxLength(10)
                    ->required()
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('cargo')
                    ->maxLength(255)
                    ->required()
                    ->default(null),
                 Forms\Components\TextInput::make('resolucion')
                    ->maxLength(255)
                    ->required()
                    ->default(null),
                Forms\Components\FileUpload::make('firma')
                    ->image()
                    ->required()
                    ->directory('autoridades')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        /* '16:9',
                        '4:3', 
                        '1:1', */
                        '3:4',
                    ])
                    ->imageEditorMode(2)
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth('120')
                    ->imageResizeTargetHeight('120'),
                Forms\Components\FileUpload::make('sello')
                    ->image()
                    ->required()
                    ->directory('autoridades')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        /* '16:9',
                        '4:3', 
                        '1:1', */
                        '3:4',
                    ])
                    ->imageEditorMode(2)
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth('120')
                    ->imageResizeTargetHeight('120'),
                Forms\Components\Toggle::make('activo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargo')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('firma'),
                Tables\Columns\ImageColumn::make('sello'),
                Tables\Columns\IconColumn::make('activo')
                    ->boolean(),
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
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAutoridades::route('/'),
            'create' => Pages\CreateAutoridad::route('/create'),
            'edit' => Pages\EditAutoridad::route('/{record}/edit'),
        ];
    }
}
