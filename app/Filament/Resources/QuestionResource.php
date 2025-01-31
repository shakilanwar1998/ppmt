<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;


class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('reference_id')
                    ->label('Reference')
                    ->options(fn () => Reference::pluck('reference_code', 'id'))
                    ->default(fn () => Reference::where('is_default', true)->value('id') ?? 0)

                    ->columnSpanFull(),

                Forms\Components\TextInput::make('question_number')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('question')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image_url')
                    ->label('Image')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('sub_question')
                    ->label('Sub Question')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('sub_question_image')
                    ->label('Sub Image')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('option_a')
                    ->label('Option A')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Checkbox::make('is_correct_a')
                    ->label('Correct Answer A')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            $set('correct_answer', 'A');
                            $set('is_correct_b', false);
                            $set('is_correct_c', false);
                            $set('is_correct_d', false);
                        }
                    }),

                Forms\Components\TextInput::make('option_b')
                    ->label('Option B')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Checkbox::make('is_correct_b')
                    ->label('Correct Answer B')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            $set('correct_answer', 'B');
                            $set('is_correct_a', false);
                            $set('is_correct_c', false);
                            $set('is_correct_d', false);
                        }
                    }),

                Forms\Components\TextInput::make('option_c')
                    ->label('Option C')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Checkbox::make('is_correct_c')
                    ->label('Correct Answer C')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            $set('correct_answer', 'C');
                            $set('is_correct_a', false);
                            $set('is_correct_b', false);
                            $set('is_correct_d', false);
                        }
                    }),

                Forms\Components\TextInput::make('option_d')
                    ->label('Option D')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Checkbox::make('is_correct_d')
                    ->label('Correct Answer D')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state) {
                            $set('correct_answer', 'D');
                            $set('is_correct_a', false);
                            $set('is_correct_b', false);
                            $set('is_correct_c', false);
                        }
                    }),

                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(function () {
                        return Category::pluck('name', 'id');
                    })
                    ->default(function () {
                        $latestId = Question::orderBy('id', 'desc')->value('category_id');
                        return $latestId ?? 0;
                    })
                    ->required()
                    ->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image'),

                Tables\Columns\TextColumn::make('question')
                    ->html()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('option_a')
                    ->label('A')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('option_b')
                    ->label('B')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('option_c')
                    ->label('C')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('option_d')
                    ->label('D')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('answer')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('View')
                    ->url(fn ($record): string => route('demo.question', $record->id))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])->actionsPosition(Tables\Enums\ActionsPosition::BeforeCells)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('id','desc')->paginated([1,2,3,4,5,10, 25, 50, 100, 200, 500, 1000, 'all']);
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
