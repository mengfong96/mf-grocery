<?php

use App\Http\Controllers\GroceryListProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPreferenceController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [UserPreferenceController::class, 'index'])->name('home');

Route::resource('user-preferences', UserPreferenceController::class)->except(['index','show','edit','destroy']);
Route::resource('grocery-lists', GroceryListProductController::class)->only(['index','store']);
Route::resource('products', ProductController::class);
