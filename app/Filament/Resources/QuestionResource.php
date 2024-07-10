<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Category;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
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
                Forms\Components\RichEditor::make('question')
                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'h2',
                        'h3',
                        'italic',
                        'redo',
                        'underline',
                    ])
                    ->maxLength(400)
                    ->columnSpanFull(),

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
                    ->default(function () {
                        $latestId = Question::orderBy('id', 'desc')->value('id');
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
                Tables\Columns\TextColumn::make('question')
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('id','desc');
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
