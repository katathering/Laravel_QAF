<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/questions');
});

Route::post('/saveAnswer', [AnswerController::class, 'store']);

Route::get('/myQuestions', function () {
    return redirect('/questions');
});
Route::post('/myQuestions', [QuestionController::class, 'myQuestions'])->name('myQuestions');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/questions');
})->name('dashboard');

Route::resource('questions', QuestionController::class)->only('index', 'show', 'create');
Route::resource('questions', QuestionController::class)->middleware('auth')->except('index', 'show');


