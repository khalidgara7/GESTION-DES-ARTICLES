<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;


Route::prefix('category')
    ->name('category.')
    ->controller(CategoryController::class)
    ->group(function ()
    {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store'); // category.store

        Route::get('/edit/{category}', 'edit')->name('edit'); // category.edit
        Route::post('/update/{id}', 'update')->name('update'); // category.store

        Route::delete('/destroy/{category}', 'destroy')->name('destroy'); // category.destroy
    });



    Route::prefix('article')
    ->name('article.')
    ->controller(ArticleController::class)
    ->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{article}', 'show')->name('show');        
        
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store'); // article.store

        Route::get('/edit/{article}', 'edit')->name('edit'); // article.edit
        Route::post('/update/{id}', 'update')->name('update'); // article.store

        Route::delete('/destroy/{article}', 'destroy')->name('destroy'); // article.destroy
    });


    Route::get('articles/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

Route::post('/articles/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
