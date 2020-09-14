<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;

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
// Route::get('/user', 'HelloController@index');
Route::get('/', function () {
    return view('pages.index');
});

Route::get('about/us', [HelloController::class, 'about'])->name('about');
Route::get('contact/us', [HelloController::class, 'contact'])->name('contact');
Route::get('writePost', [PostController::class, 'writePost'])->name('writePost');

//category crud are here============
Route::get('add/category', [PostController::class, 'AddCategory'])->name('add.category');
Route::post('store/category', [PostController::class, 'storeCategory'])->name('store.category');
Route::get('all/category', [PostController::class, 'allCategory'])->name('all_category');
Route::get('view/category/{id}', [PostController::class, 'ViewCategory']);

