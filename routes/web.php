<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('about', function () {
//     return view('about');
// });
Route::get('about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

// Название сущности в URL во множественном числе, контроллер в единственном
Route::get('articles', [App\Http\Controllers\ArticleController::class, 'index'])
  ->name('articles.index'); // имя маршрута, нужно для того, чтобы не создавать ссылки руками

  Route::get('articles/create', 'App\Http\Controllers\ArticleController@create')
  ->name('articles.create');

  Route::post('articles', 'App\Http\Controllers\ArticleController@store')
  ->name('articles.store');

  Route::get('articles/{id}', [App\Http\Controllers\ArticleController::class, 'show'])
  ->name('articles.show');

  Route::get('articles/{id}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])
  ->name('articles.edit');

  Route::patch('articles/{id}', [App\Http\Controllers\ArticleController::class, 'update'])
  ->name('articles.update');