<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => ['checkAdmin']], function(){
        //user route
        Route::resource('user', UserController::class);
        Route::post('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        //category route
        Route::resource('category', CategoryController::class);
        Route::post('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

        //
    });
});
