<?php

namespace App\Http\Controllers;

use App\Models\Question;
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

        if($question->sub_question_image){
            $question->sub_question_image = url('storage/'.$question->sub_question_image);
        }

        return Inertia::render('Demo',[
            'question' => $question
        ]);
    }
}
