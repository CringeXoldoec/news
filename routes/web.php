<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestingController;

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
})->name('root');

Route::get('/login', [UserController::class, 'loginFrom'])->name('login');
Route::post('/login',[UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'registterForm'])->name('register');
Route::post('/register',[UserController::class, 'register'])->name('register.post');


Route::get('/ofer', [RequestingController::class, 'index'])->name('ofer')->middleware('auth');
Route::post('/ofer', [RequestingController::class, 'store'])->name('ofer.post')->middleware('auth');



Route::get('/shows', [RequestingController::class, 'indexShow'])->name('shows')->middleware('auth');
Route::get('/shows', [RequestingController::class, 'show'])->name('shows')->middleware('auth');


