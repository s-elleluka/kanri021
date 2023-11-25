<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Auth::routes();


Route::group(['middleware' => ['auth']], function(){

//    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    
//    Route::get('/create', [App\Http\Controllers\CreateController::class, 'index'])->name('create');

    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('index');

    Route::resource('/items', App\Http\Controllers\ItemController::class)->only(['index', 'store', 'update', 'destroy']);
    
    Route::resource('/category', App\Http\Controllers\CategoryController::class)->only(['index', 'store', 'destroy']);
});



