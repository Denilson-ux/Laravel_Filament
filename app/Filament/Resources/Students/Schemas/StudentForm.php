<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('teacher_id')
                    ->relationship('teacher', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('grade')
                    ->required(),
                TextInput::make('section')
                    ->required(),
            ]);
    }
}
