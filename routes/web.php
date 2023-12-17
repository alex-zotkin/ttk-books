<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

//Роуты книг
Route::controller(BookController::class)->group(function(){
    Route::get('/', 'index')->name('books');
    Route::get('/book/create', 'create')->name('book_create')->middleware('auth');
    Route::post('/book/store', 'store')->name('book_store')->middleware('auth');

    Route::middleware(['auth', 'book'])->group(function () {
        Route::get('/book/{id}/edit', 'edit')->name('book_edit');
        Route::post('/book/{id}/save', 'save')->name('book_save');
        Route::get('/book/{id}/delete', 'delete')->name('book_delete');
    });

    Route::get('/book/{id}', 'about')->name('book_about');
});

//Роуты авторов
Route::controller(AuthorController::class)->group(function(){
    Route::get('/authors', 'index')->name('authors');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/author/create', 'create')->name('author_create');
        Route::post('/author/store', 'store')->name('author_store');
        Route::get('/author/{id}/edit', 'edit')->name('author_edit');
        Route::post('/author/{id}/save', 'save')->name('author_save');
        Route::get('/author/{id}/delete', 'delete')->name('author_delete');
    });

    Route::get('/author/{id}', 'about')->name('author_about');
});

//Роуты категорий (разделов)
Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index')->name('categories');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/category/create', 'create')->name('category_create');
        Route::post('/category/store', 'store')->name('category_store');
        Route::get('/category/{id}/edit', 'edit')->name('category_edit');
        Route::post('/category/{id}/save', 'save')->name('category_save');
        Route::get('/category/{id}/delete', 'delete')->name('category_delete');
    });

    Route::get('/category/{id}', 'about')->name('category_about');
});

//Роуты логина, регистрации, логаута
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'loginView')->name('login');
    Route::get('/registration', 'registrationView')->name('registration');
    Route::post('/login', 'login')->name('login_post');
    Route::post('/registration', 'registration')->name('registration_post');
    Route::get('/logout', 'logout')->name('logout');
});

//Роуты профиля
Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_update', [ProfileController::class, 'profile_update'])->name('profile_update');
});

//Роут поиска по книгам и авторам
Route::get('/search', [SearchController::class, 'index'])->name('search');
