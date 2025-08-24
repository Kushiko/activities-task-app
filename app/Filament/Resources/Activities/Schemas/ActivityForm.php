<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    Group::make()->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50),

                        Textarea::make('short_description')
                            ->required()
                            ->maxLength(200)
                            ->rows(3),

                        Textarea::make('description')
                            ->required()
                            ->rows(6),

                        FileUpload::make('media_files')
                            ->multiple()
                            ->directory('activity-media')
                            ->required(),

                    ])->columnSpan(2),

                    Group::make()->schema([
                        Select::make('participant_id')
                            ->relationship('participant', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('activity_type_id')
                            ->relationship('activityType', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('registration_url')
                            ->url(),

                        Textarea::make('location')
                            ->json()
                            ->required()
                            ->rows(4),

                        Textarea::make('schedule')
                            ->json()
                            ->required()
                            ->rows(4),
                    ])->columnSpan(1),
                ]),
            ]);
    }
}