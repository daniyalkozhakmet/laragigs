<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaragigController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [UserController::class, 'registerShow'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::get('/login', [UserController::class, 'loginShow'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/gigs/{search_category?}', [LaragigController::class, 'index'])->middleware('auth')->name('gigs');
Route::get('/gigs/{id}', [LaragigController::class, 'single'])->middleware('auth')->where('id', '[0-9]+');;
Route::get('/gigs/mine', [LaragigController::class, 'myGigs'])->middleware('auth');
Route::get('/gigs/edit/{id}', [LaragigController::class, 'editShow'])->middleware('auth')->where('id', '[0-9]+');
Route::put('/gigs/edit/{id}', [LaragigController::class, 'edit'])->middleware('auth')->where('id', '[0-9]+');
Route::get('/create', [LaragigController::class, 'show'])->middleware('auth');
Route::post('/create', [LaragigController::class, 'create'])->middleware('auth')->name('create');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
