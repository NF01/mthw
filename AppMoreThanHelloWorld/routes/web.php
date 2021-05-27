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



Route::get('/api', [ApiController::class, 'apiget'])->name('apiget');
Route::Post('/api', [ApiController::class, 'apipost'])->name('apipost');
Route::Put('/api', [ApiController::class, 'apiput'])->name('apiput');
Route::Delete('/api', [ApiController::class, 'apidelete'])->name('apidelete');




    Route::get('/', function () {
        return view('welcome');
    });

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
