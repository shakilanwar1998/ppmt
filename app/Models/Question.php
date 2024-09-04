<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'sub_question',
        'answer',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'category_id',
        'image_url',
        'reference_id',
        'question_number',
        'sub_question_image'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
