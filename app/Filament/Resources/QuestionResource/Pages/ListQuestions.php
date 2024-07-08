<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Imports\QuestionImporter;
use App\Filament\Resources\QuestionResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
//use Konnco\FilamentImport\Actions\ImportAction;
//use Konnco\FilamentImport\Actions\ImportField;

class ListQuestions extends ListRecords
{
    protected static string $resource = QuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->importer(QuestionImporter::class),
        ];
    }
}
