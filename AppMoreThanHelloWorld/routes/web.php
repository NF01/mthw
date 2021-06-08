<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllerGET;
use App\Http\Controllers\ApiControllerDELETE;
use App\Http\Controllers\ApiControllerPOST;
use App\Http\Controllers\ApiControllerPUT;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;



//REST API Routing//begin
Route::prefix('api')->group(function () {


    //GET


    //Question(s)
    Route::get('/questions', [ApiControllerGET::class, 'getAllQuestions']);
    Route::get('/question/{n}', [ApiControllerGET::class, 'getQuestionFromId']);
    Route::get('/question/{n}/type', [ApiControllerGET::class, 'getQuestionTypeFromQuestionId']);

    //Reponse(s)
    Route::get('/reponses', [ApiControllerGET::class, 'getAllResponses']);
    Route::get('/reponse/{n}', [ApiControllerGET::class, 'getResponseFromId']);
    Route::get('/reponses/idQ/{n}', [ApiControllerGET::class, 'getResponsesFromIdQuestion']);

    //Image(s)
    Route::get('/images', [ApiControllerGET::class, 'getAllImages']);
    Route::get('/image/{n}', [ApiControllerGET::class, 'getImageFromId']);

    //Chapters
    Route::get('/chapitres', [ApiControllerGET::class, 'getAllChapters']);
    Route::get('/questions/idC/{n}', [ApiControllerGET::class, 'getAllQuestionsFromIdChapter']);

    //User
    Route::get('/user/{n}', [ApiControllerGET::class, 'getUserFromId']);
    Route::get('/users/xp', [ApiControllerGET::class, 'getUsersSortByXp']);

    //Badge
    Route::get('/badges', [ApiControllerGET::class, 'getAllBadges']);



    Route::middleware(['auth'])->group(function () {

    //POST
    //Instance

    //Experience
    Route::Post('/user/xp', [ApiControllerPOST::class, 'addXpToUser']);

    //PUT //update user
    Route::put('/user', [ApiControllerPUT::class, 'updateUser']);

    });

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::Post('/question', [ApiControllerPOST::class, 'postquestion']);
        Route::Post('/reponse', [ApiControllerPOST::class, 'postresponse']);
        //image
        Route::Post('/image', [ApiControllerPOST::class, 'postimage']);

    //DELETE
    //Instance
    Route::Delete('/question', [ApiControllerDELETE::class, 'deleteinstance']);
    //Image
        Route::Delete('/image', [ApiControllerDELETE::class, 'deleteimage']);


    //PUT (update)
    //Instance
    Route::Put('/question', [ApiControllerPUT::class, 'updatequestion']);
    Route::Put('/reponse', [ApiControllerPUT::class, 'updateresponse']);


    });
});

Auth::routes();

//Login routing
Route::get('/', function () {
    return view('auth.login');
});


 Route::group(['middleware' => ['auth','csrf']], function () {
     Route::get('/profil', function () {

          if (Auth::user()->isAdmin == 1) {
            //   echo 'Im admin!!';
          }
          return view('vue');
     });
 });

// if (auth()->check()) {
//     Route::get('/user', function () {
//         return view('auth.login');
//     });
// }

Route::get('/home', function () {
    return view('vue')->with('auth_user',  auth()->user());
});


//Vue routing

Route::get('{vue}', function ($vue) {
    return view('vue')->with('vue', $vue);
})->where(['vue' => 'vue|admin|accueil|info|quizz|quizz/2|ranking|profil|experience']);

Route::get('/{any}', function () {
    return abort(404);
});
