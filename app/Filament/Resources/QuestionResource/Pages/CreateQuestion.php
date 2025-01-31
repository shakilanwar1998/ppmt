<?php

namespace App\Filament\Resources\QuestionResource\Pages;

use App\Filament\Resources\QuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestion extends CreateRecord
{
    protected static string $resource = QuestionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['answer'] = $this->getCorrectAnswer($data);
        return $data;
    }

    private function getCorrectAnswer($data): string {
        return $data['is_correct_a'] ? 'A': ($data['is_correct_b'] ? 'B' : ($data['is_correct_c'] ? 'C' : 'D'));
    }
}
