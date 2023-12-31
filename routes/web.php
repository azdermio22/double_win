<?php

use App\Livewire\Annunci;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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
Route::post('/update/{user}',[ProfileController::class,'update'])->name('user_update');
Route::get('/profile_detail/{article}',[ArticleController::class,'profile_detail'])->name('profile_detail');
Route::get('/article_update/{article}',[ArticleController::class,'edit'])->name('article_update');
Route::put('/update/{article}',[ArticleController::class,'update'])->name('update');
Route::delete('/destroy/{article}',[ArticleController::class,'destroy'])->name('destroy');
Route::get('/annunci',[Annunci::class,'annunci'])->name('annunci');
Route::post('/password_reset',[PublicController::class,'password_reset'])->name('password_reset');
Route::post('/add_to_cart',[CartController::class,'add_to_cart'])->name('add_to_cart');
Route::get('/cart',[CartController::class,'cart'])->name('cart')->middleware('auth');





