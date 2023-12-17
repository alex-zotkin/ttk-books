<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Book;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        //Gate для окраничения редактирования книг. Доступ имеет только админ или пользователь, добавивший книгу
        Gate::define('edit_book', function(User $user, Book $book){
            return $user->isAdmin || $book->user_id == $user->id;
        });

        //Доступ к функционалу имеют только авторизованные пользователи
        Gate::define('auth', function(User $user){
            return auth()->check();
        });

        //Доступ к функционалу имеет только админ
        Gate::define('admin', function(User $user){
            return $user->isAdmin;
        });
    }
}
