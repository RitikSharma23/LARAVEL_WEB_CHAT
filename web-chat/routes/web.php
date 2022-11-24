<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::view('loginpage','loginpage');
Route::view('registerpage','registerpage');
Route::view('index','index');
Route::post('profile',[DataController::class,'prof']);

Route::post('register',[DataController::class,'register']);
Route::post('login',[DataController::class,'login']);
Route::post('doupdate',[DataController::class,'doupdate']);
Route::get('sign-in.html',[DataController::class,'log'])->name('sign-in.html');
