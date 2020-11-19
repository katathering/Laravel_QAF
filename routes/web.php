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
    return view('welcome');
});

Route::get('questions/answers/table', function () {
    return view('table');
});

Route::post('/saveAnswer', [AnswerController::class, 'store']);

/*Route::post('/saveAnswer', function () {
    $data = "etwas";
    echo $data;
});*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('questions', QuestionController::class);

Route::resource('answers', AnswerController::class);
