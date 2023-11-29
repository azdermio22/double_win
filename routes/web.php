<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/',[PublicController::class,'home'])->name('home');
Route::get('/vendi',[ArticleController::class,'create'])->name('vendi')->middleware('auth');
Route::post('/store',[ArticleController::class,'store'])->name('store');
Route::get('/detail/{article}',[ArticleController::class,'index'])->name('detail');
Route::get('/profile/{user}',[ProfileController::class,'profile'])->name('profile');
Route::post('/update/{user}',[ProfileController::class,'update'])->name('update');




