<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(50)
                    ->columnSpan(1),

                Select::make('participant_id')
                    ->relationship('participant', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(1),

                Textarea::make('short_description')
                    ->required()
                    ->maxLength(200)
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),

                FileUpload::make('media_files')
                    ->multiple()
                    ->directory('activity-media')
                    ->required()
                    ->columnSpanFull(),

                Select::make('activity_type_id')
                    ->relationship('activityType', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(1),

                TextInput::make('registration_url')
                    ->url()
                    ->columnSpan(1),

                Textarea::make('location')
                    ->json()
                    ->required()
                    ->rows(4)
                    ->columnSpan(1),

                Textarea::make('schedule')
                    ->json()
                    ->required()
                    ->rows(4)
                    ->columnSpan(1),
            ]);
    }
}
