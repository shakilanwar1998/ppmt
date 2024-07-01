<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'answer','option_a','option_b','option_c','option_d','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
