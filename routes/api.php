<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;

Route::get('/user', function (Request $request) {

    return $request->user();

})->middleware('auth:sanctum');

// this code instruction can replace all the above endpoints, but its restriced to the main 5 methods(show, index, update, delete)

Route::middleware('api') -> group(function() {
route::resource('categories', CategorieController::class);});
Route::middleware('api') -> group(function() {
route::resource('Scategories', ScategorieController::class);});
Route::middleware('api') -> group(function() {
route::resource('Article', ArticleController::class);});
Route::get('/Article/{idcat}',action: [ArticleController::class, 'shshowArticlesBySCAT']);
Route::get('/articles/art/articlespaginate', [ArticleController::class,+-'articlesPaginate']);