<?php

namespace App\Filament\Resources\Messages;

use App\Filament\Resources\Messages\Pages\CreateMessage;
use App\Filament\Resources\Messages\Pages\EditMessage;
use App\Filament\Resources\Messages\Pages\ListMessages;
use App\Filament\Resources\Messages\Schemas\MessageForm;
use App\Filament\Resources\Messages\Tables\MessagesTable;
use App\Models\Message;
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


class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

public static function form(Schema $schema): Schema
{
    return $schema
        ->components([
            Forms\Components\Select::make('type')
                ->options([
                    'aviso' => 'Aviso',
                    'recordatorio' => 'Recordatorio',
                ])
                ->required()
                ->label('Tipo de mensaje'),
            Forms\Components\TextInput::make('title')
                ->required()
                ->label('Título del Aviso/Recordatorio'),
            Forms\Components\Textarea::make('content')
                ->required()
                ->label('Contenido'),
            Forms\Components\TextInput::make('grade')
                ->label('Grado (Opcional)'),
            Forms\Components\TextInput::make('section')
                ->label('Sección (Opcional)'),
            Forms\Components\Toggle::make('is_urgent')
                ->label('Marcar como urgente'),
            Forms\Components\Hidden::make('sender_id')
                ->default(auth()->id()),
        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('type')
                ->label('Tipo')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('title')
                ->label('Título')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('grade')
                ->label('Grado')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('section')
                ->label('Sección')
                ->sortable()
                ->searchable(),
            Tables\Columns\IconColumn::make('is_urgent')
                ->label('Urgente')
                ->boolean()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de envío')
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
            'index' => ListMessages::route('/'),
            'create' => CreateMessage::route('/create'),
            'edit' => EditMessage::route('/{record}/edit'),
        ];
    }
}
