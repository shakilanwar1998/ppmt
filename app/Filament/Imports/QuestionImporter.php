<?php

namespace App\Filament\Imports;

use App\Models\Category;
use App\Models\Question;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class QuestionImporter extends Importer
{
    protected static ?string $model = Question::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('question')
                ->requiredMapping()
                ->rules(['required', 'max:400']),
            ImportColumn::make('option_a')
                ->label('Option A')
                ->rules(['required']),
            ImportColumn::make('option_b')
                ->label('Option B')
                ->rules(['required']),
            ImportColumn::make('option_c')
                ->label('Option C')
                ->rules(['required']),
            ImportColumn::make('option_d')
                ->label('Option D')
                ->rules(['required']),
            ImportColumn::make('answer')
                ->label('Correct Answer')
                ->rules(['required']),
            ImportColumn::make('category_id')
                ->label('Category')
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Question
    {
        // return Question::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Question();
    }

    protected function beforeFill(): void
    {
        $category_id = Category::where([
            'name' => $this->data['category_id']
        ])->value('id');

        if(!$category_id){
            $category_id = Category::create(['name' => $this->data['category_id']])->id;
        }
        $this->data['answer'] = strtoupper($this->data['answer']);
        $this->data['category_id'] = $category_id ?? null;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your question import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
