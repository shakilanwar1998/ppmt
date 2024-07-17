<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExamController extends Controller
{
    public function demoQuestion($id){
        $question = Question::find($id);
        if (!$question){
            return Inertia::render('Error', ['message'=>'Question not found']);
        }
        if($question->image_url){
            $question->image_url = url('storage/'.$question->image_url);
        }

        return Inertia::render('Demo',[
            'question' => $question
        ]);
    }
}
