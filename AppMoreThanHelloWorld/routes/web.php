<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiController;


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

Route::get('/api', [ApiController::class, 'get'])->name('apiget');
Route::get('/api/{n}', [ApiController::class, 'getone'])->name('apigetone');
Route::Post('/api', [ApiController::class, 'post'])->name('apipost');
Route::Put('/api', [ApiController::class, 'put'])->name('apiput');
Route::Delete('/api', [ApiController::class, 'delete'])->name('apidelete');



//Login routing

    Route::get('/', function () {
        return view('welcome');
    });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Vue Router

Route::get('/{any}', function () {
    return view('vue_test');}
)->where('any', '.*');