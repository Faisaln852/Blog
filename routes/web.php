<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resource('userfrontend', \App\Http\Controllers\Frontend\FrontendController::class);
Route::get('/',[FrontendController::class,'index']);

Route::get('/userfrontend/{category_slug}/{post_slug}',[FrontendController::class,'viewPost']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
Route::resource('dashboard', \App\Http\Controllers\Admin\DashboardController::class);
Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
Route::resource('post', \App\Http\Controllers\Admin\PostController::class);

});