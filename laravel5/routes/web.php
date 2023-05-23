<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManegerController;
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
})->name('home');
Route::get('/login',[AuthManegerController::class,'login'])->name('login');
Route::post('/login', [AuthManegerController::class,'loginPost'])->name('login.post');
Route::get('/regestration',[AuthManegerController::class,'regestration'])->name('regestration');
Route::post('/regestration',[AuthManegerController::class,'regestrationpost'])->name('regestration.post');
Route::get('/logout',[AuthManegerController::class,'logout'])->name('logout');
Route::group(['middleware' => 'auth'],function(){
    Route::get('/profile',function(){
        return "Hi";
     });

});


