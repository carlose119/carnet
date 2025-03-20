<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpleadoResource\Pages;
use App\Filament\Resources\EmpleadoResource\RelationManagers;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class EmpleadoResource extends Resource
{
    protected static ?string $model = Empleado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('departamento_id')
                    ->relationship(name: 'departamento', titleAttribute: 'nombre')
                    ->required()
                    ->preload()
                    ->searchable(),
                Forms\Components\Select::make('cargo_id')
                    ->relationship(name: 'cargo', titleAttribute: 'nombre')
                    ->required()
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('cedula')
                    ->maxLength(20)
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre')
                    ->maxLength(255)
                    ->required()
                    ->default(null),
                Forms\Components\FileUpload::make('imagen')
                    ->image()
                    ->directory('empleados')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        /* '16:9',
                        '4:3', 
                        '1:1', */
                        '3:4',
                    ])
                    ->imageEditorMode(2)
                    ->imageCropAspectRatio('3:4')
                    ->imageResizeTargetWidth('98')
                    ->imageResizeTargetHeight('121'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('departamento.nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargo.nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cedula')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imagen'),
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
                Tables\Filters\SelectFilter::make('departamento_id')
                    ->relationship('departamento', 'nombre')
                    ->label('Departamento')
                    ->multiple()
                    ->preload(),
                Tables\Filters\SelectFilter::make('cargo_id')
                    ->relationship('cargo', 'nombre')
                    ->label('Cargos')
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf') 
                    ->label('Carnet')
                    ->color('success')
                    ->icon('heroicon-o-credit-card')
                    ->requiresConfirmation()
                    ->action(function (Empleado $record) {
                        return response()->streamDownload(function () use ($record) {
                            //$customPaper = array(0,0,360,360);
                            $customPaper = 'carta';
                            echo Pdf::loadHtml(
                                Blade::render('pdf.carnet-empleado', ['empleado' => $record])
                            )//->stream()
                            ->setPaper($customPaper, 'portrait')
                            ->download('carnet-empleado' . $record->cedula . '.pdf');                            
                        }, 'carnet-empleado' . $record->cedula . '.pdf');
                    }),
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
            'index' => Pages\ListEmpleados::route('/'),
            'create' => Pages\CreateEmpleado::route('/create'),
            'edit' => Pages\EditEmpleado::route('/{record}/edit'),
        ];
    }
}
