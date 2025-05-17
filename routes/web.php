<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::view('/index_Page','index');

Route::get('/quiz', [QuestionController::class, 'index'])->middleware('auth');

Route::post('/quiz_submit', [QuestionController::class, 'submit']);



Route::delete('/delete-data/{id}', [QuestionController::class,'deleteData']);



Route::get('scores',[QuestionController::class,'showScores']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//added comment in web.php for testing-branch-1
//added comment usinng testing-branch-2