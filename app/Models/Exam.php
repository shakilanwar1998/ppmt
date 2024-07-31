<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'banner',
        'total_marks',
        'total_questions',
        'category_id',
        'duration'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
