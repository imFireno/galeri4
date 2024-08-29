<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

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



Route::middleware('guest')->group(function(){
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register');
    Route::post('/loginpost', [AuthController::class, 'login']);
    Route::post('/registerpost', [AuthController::class, 'register']);
});
Route::middleware('auth')->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index');
        Route::get('/', 'profile');
    });
    Route::controller(FotoController::class)->group(function(){
        Route::get('/profile/{username}', 'index')->name('foto');
        Route::get('/detailprofile/{id}', 'detail');
        Route::delete('/delete/{id}', 'destroy');
        Route::get('/editprofile/{id}', 'editprofileview');
        Route::put('/editprofile/{id}', 'update');
        Route::get('/editfoto/{id}', 'editfotoview');
        Route::put('/editfoto/{id}', 'editfoto');
        Route::put('/addalbum/{id}', 'addalbum');
    });
    Route::controller(AlbumController::class)->group(function(){
        Route::get('/album', 'index');
        Route::get('/createalbum', 'createalbumview');
        Route::post('/createalbum', 'store');
        Route::get('/albumdetail/{id}', 'show');
    });
    Route::controller(UploadController::class)->group(function(){
        Route::get('/upload', 'index');
        Route::post('/uploadpost', 'create');
    });
    Route::get('/signout', [AuthController::class, 'logout']);
});