<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     


    public function index()
    {
    
        $user = Auth::id();
        // $userData =  QuizResult::where('user_id',$user);
        // $us = QuizResult::all();
        // dd($us);
        $userData = QuizResult::where('user_id',Auth::id())->first();
       
        //  dd($userData);
        if($userData)
        {
            // dd($userData);
            // return view('score');

            // return redirect()->url('scores');
            return redirect()->to("scores");
            
        }

        else
        {
            return view('home');
        }
        // return view('home');
            
       
    }
}
