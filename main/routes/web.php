<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategorieArticleController;
use \App\Http\Controllers\ArticleController;
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
    return view('/client/client');
});

Route::get('/admin', function () {
    return view('/admin/layout');
});


Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('categorieArticle', CategorieArticleController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('centres',\App\Http\Controllers\CentreController::class);
});
Route::get('/article/FindArticlesByCatFront/{cat}', [ArticleController::class, 'FindArticlesByCatFront']);
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/article/showFront/{a}', [ArticleController::class, 'showFront']);

});

Route::resource('services',\App\Http\Controllers\ServiceController::class);
Route::get('services/create2/{id}',function($id){
    return view("service.create",['centre_id'=>$id]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
