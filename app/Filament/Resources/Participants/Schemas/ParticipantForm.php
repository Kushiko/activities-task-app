<?php

namespace App\Filament\Resources\Participants\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParticipantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('website_url')
                    ->url()
                    ->nullable(),
                FileUpload::make('logo_path')
                    ->image()
                    ->directory('participant-logos'),
                Textarea::make('location')
                    ->json()
                    ->required()
                    ->rows(5),
            ]);
    }
}