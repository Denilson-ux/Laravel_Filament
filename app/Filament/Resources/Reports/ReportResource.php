<?php

namespace App\Filament\Resources\Reports;

use App\Filament\Resources\Reports\Pages\CreateReport;
use App\Filament\Resources\Reports\Pages\EditReport;
use App\Filament\Resources\Reports\Pages\ListReports;
use App\Filament\Resources\Reports\Schemas\ReportForm;
use App\Filament\Resources\Reports\Tables\ReportsTable;
use App\Models\Report;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Filament\Forms;
use Filament\Tables;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;




class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

public static function form(Schema $schema): Schema
{
    return $schema
        ->schema([
            Forms\Components\Select::make('student_id')
                ->relationship('student', 'name')
                ->searchable()
                ->required()
                ->label('Estudiante'),
            Forms\Components\TextInput::make('title')
                ->required()
                ->label('Título del Reporte'),
            Forms\Components\Textarea::make('content')
                ->required()
                ->label('Contenido'),
            Forms\Components\Hidden::make('reporter_id')
                ->default(auth()->id()),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Título')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('student.name')
                ->label('Estudiante')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('reporter.name')
                ->label('Docente')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de creación')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            EditAction::make(),
            DeleteAction::make(),
        ])
        ->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
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
            'index' => ListReports::route('/'),
            'create' => CreateReport::route('/create'),
            'edit' => EditReport::route('/{record}/edit'),
        ];
    }
}
