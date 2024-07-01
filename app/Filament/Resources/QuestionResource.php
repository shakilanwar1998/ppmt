<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Category;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('question')
                    ->required()
                    ->maxLength(400)
                    ->columnSpanFull(),

//                Forms\Components\Repeater::make('options')
//                    ->schema([
//                        Forms\Components\TextInput::make('option')
//                            ->label('Option')
//                            ->columnSpanFull()
//                            ->required(),
//
//                        Forms\Components\Toggle::make('is_correct')
//                            ->label('Correct Answer')
//                            ->inline() // Display radio buttons inline with options
//                            ->columnSpanFull(),
//                    ])
//                    ->minItems(1)
//                    ->columns(2)
//                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image_url')
                ->label('Image')
                ->columnSpanFull(),

                Forms\Components\TextInput::make('option_a')
                    ->label('Option A')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\TextInput::make('option_b')
                    ->label('Option B')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\TextInput::make('option_c')
                    ->label('Option C')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\TextInput::make('option_d')
                    ->label('Option D')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Select::make('answer')
                    ->label('Correct Answer')
                    ->options(function () {
                        return [
                            'A' => 'A',
                            'B' => 'B',
                            'C' => 'C',
                            'D' => 'D',
                        ];
                    })
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(function () {
                        return Category::pluck('name', 'id');
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
                Tables\Columns\TextColumn::make('question')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option A')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option B')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option C')
                    ->searchable(),
                Tables\Columns\TextColumn::make('option D')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Answer')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
