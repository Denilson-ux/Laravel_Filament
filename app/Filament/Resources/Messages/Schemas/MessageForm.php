<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sender_id')
                    ->relationship('sender', 'name')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('grade')
                    ->default(null),
                TextInput::make('section')
                    ->default(null),
                Toggle::make('is_urgent')
                    ->required(),
            ]);
    }
}
