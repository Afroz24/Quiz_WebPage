<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuizResult;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $r_id =  Result::where('user_id',Auth::id())->first();
        
        if($r_id)
        {
            // return redirect()->url("scores");
            return redirect()->to("scores");

        }

        else
        {
            $question = Question::first();

            return view('quiz', compact('question'));
        }
        
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
        ]);


        $question = Question::findOrFail($request->input('question_id'));
        $correctAnswer = $question->correct_option;

        $userAnswer = $request->input('answer');

        // Check if the user's answer is correct
        $isCorrect = ($userAnswer === $correctAnswer);

        // dd($isCorrect);

        // Store the user's answer in the database
        $user = Auth::user();
        QuizResult::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
        ]);

        // Calculate the score
        $score = QuizResult::where('user_id', $user->id)
            ->where('is_correct', true)
            ->count();


        $wrong = 10 - $score;


        $id = QuizResult::where('user_id',$user->id)->get();

      

        $question = Question::where('id', '>', $request->input('question_id'))->first();





        //iam saving score and user id in other table to retrieve it in other place

        $quest = Question::where('id', $request->input('question_id'))->first();

        if($quest->id == 10)
        {
            $obj = new Result;
            $obj->user_id = $user->id;
            $obj->score = $score;

            $obj->save();

            return view('index', compact('score', 'wrong', 'id'));
        }




        // if (!$question) {
        //     // No more questions, redirect to results or homepage
        
        //     return view('index', compact('score', 'wrong', 'id'));
        // }

        return view('quiz', compact('question'));

    }



    public function showScores()
    {
        // $user = Auth::id();
        $data = Result::where('user_id',Auth::id())->first();

        return view ('score',compact('data'));

        // dd($data);
    }





    public function deleteData($id)
    {
        // QuizResult::find($id)->delete();

        $user = Auth::user();
        QuizResult::where('user_id',$user->id)->delete();
        Result::where('user_id',$user->id)->delete();

        return view('home');
    }

}
