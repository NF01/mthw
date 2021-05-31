<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiControllerQuestion;
use App\Http\Controllers\ApiControllerResponse;
use App\Http\Controllers\ApiControllerGET;
use App\Http\Controllers\ApiControllerDELETE;
use App\Http\Controllers\ApiControllerPOST;
use App\Http\Controllers\ApiControllerPUT;
use App\Http\Controllers\ApiControllerImage;




//REST API Routing//begin


//GET
//Question(s)
//Reponse(s)
//Image(s)
Route::get('/api/questions', [ApiControllerGET::class, 'getquestions']);
Route::get('/api/reponses', [ApiControllerGET::class, 'getresponses']);
Route::get('/api/images', [ApiControllerGET::class, 'getimages']);
Route::get('/api/question/{n}', [ApiControllerGET::class, 'getonequestion']);
Route::get('/api/reponse/{n}', [ApiControllerGET::class, 'getoneresponse']);
Route::get('/api/image/{n}', [ApiControllerGET::class, 'getoneimage']);
Route::get('/api/questions/chapitre/{n}', [ApiControllerGET::class, 'getquestionordre']);
Route::get('/api/questions/type/{n}', [ApiControllerGET::class, 'getquestiontype'])->where('n', '[1-5]');
Route::get('/api/reponses/idQ/{n}', [ApiControllerGET::class, 'getresponseIdQ']);


//DELETE
//Instance
Route::Delete('/api/question', [ApiControllerDELETE::class, 'deleteinstance']);


//POST
//Instance
//image
Route::Post('/api/image', [ApiControllerPOST::class, 'postimage']);
Route::Post('/api/question', [ApiControllerPOST::class, 'postquestion']);
Route::Post('/api/reponse', [ApiControllerPOST::class, 'postresponse']);



//PUT (update)
//Instance
Route::Put('/api/image', [ApiControllerPUT::class, 'updateimage']);
Route::Put('/api/question', [ApiControllerPUT::class, 'updatequestion']);
Route::Put('/api/reponse', [ApiControllerPUT::class, 'updateresponse']);


//REST API Routing//end




//Login routing
Route::get('/', function () {return view('welcome');});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Vue Router
Route::get('/vue', function () {
        return view('vue_test');}
    );

Route::get('/{any}', function () {
        return abort(404);}
    );
