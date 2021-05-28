<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiControllerQuestion;
use App\Http\Controllers\ApiControllerResponse;
use App\Http\Controllers\ApiControllerImage;


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


//RESTful API Routing


//API QUESTION
Route::get('/api/questions', [ApiControllerQuestion::class, 'getquestion']);
Route::get('/api/questions/{n}', [ApiControllerQuestion::class, 'getonequestion']);
Route::get('/api/questions/chapitre/{n}', [ApiControllerQuestion::class, 'getquestionordre']);
Route::get('/api/questions/type/{n}', [ApiControllerQuestion::class, 'getquestiontype'])
    ->where('n', '[1-5]');

Route::Post('/api/question', [ApiControllerQuestion::class, 'postquestion']);

Route::Put('/api/question', [ApiControllerQuestion::class, 'putquestion']);

Route::Delete('/api/question', [ApiControllerQuestion::class, 'deletequestion']);


//API REPONSE
Route::get('/api/reponses', [ApiControllerResponse::class, 'getresponses']);
Route::get('/api/reponses/{n}', [ApiControllerResponse::class, 'getoneresponse']);
Route::get('/api/reponses/idQ/{n}', [ApiControllerResponse::class, 'getresponseIdQ']);

Route::Post('/api/reponse', [ApiControllerResponse::class, 'postresponse']);

Route::Put('/api/reponse', [ApiControllerResponse::class, 'putresponse']);

Route::delete('/api/reponse', [ApiControllerResponse::class, 'deleteresponse']);

//API IMAGE
Route::get('/api/images', [ApiControllerImage::class, 'getimages']);
Route::get('/api/images/{n}', [ApiControllerImage::class, 'getoneimage']);

Route::Post('/api/image', [ApiControllerResponse::class, 'postimage']);


//Login routing

    Route::get('/', function () {
        return view('welcome');
    });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Vue Router



Route::get('/vue', function () {
        return view('vue_test');}
    );

Route::get('/{any}', function () {
        return abort(404);}
    );
