<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExamController extends Controller
{
    public function demoQuestion($id){
        $question = Question::find($id);
        return Inertia::render('Demo',[
            'question' => $question
        ]);
    }
}
