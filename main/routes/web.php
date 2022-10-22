<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategorieArticleController;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\CommentaireController;
use \App\Http\Controllers\NoteController;
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
})->name('home');

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
    Route::post('/commentaire/supprimer/{commentaire}/{a}', [CommentaireController::class, 'supprimer'])->name("commentaire.supprimer");
    Route::post('/commentaire/ajouter/{a}', [CommentaireController::class, 'ajouter']);
    Route::post('/commentaire/modifier/{a}/{commmentaire}', [CommentaireController::class, 'update']);
    Route::post('/note/ajouter/{a}', [NoteController::class, 'ajouter']);
    Route::post('/note/modifier/{a}/{note}', [NoteController::class, 'update']);
    Route::post('/note/supprimer/{note}/{a}', [NoteController::class, 'supprimer'])->name("note.supprimer");



});

Route::resource('services',\App\Http\Controllers\ServiceController::class);
Route::get('services/create2/{id}',function($id){
    return view("service.create",['centre_id'=>$id]);
});

Auth::routes();

#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
