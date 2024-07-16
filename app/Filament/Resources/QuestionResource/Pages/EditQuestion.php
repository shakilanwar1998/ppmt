<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Resources\QuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestion extends EditRecord
{
    protected static string $resource = QuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['question'] = strip_tags($data['question']);
        $data['answer'] = $this->getCorrectAnswer($data);
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['is_correct_'.strtolower($data['answer'])] = true;
        return $data;
    }

    private function getCorrectAnswer($data): string {
        return $data['is_correct_a'] ? 'A': ($data['is_correct_b'] ? 'B' : ($data['is_correct_c'] ? 'C' : 'D'));
    }
}
