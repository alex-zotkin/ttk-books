<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

/*
    Middleware для ограничения страниц по редактированию книг
    Доступ к редактированию книги книги имеет только админ или добавивший ее пользователь
*/

class BookMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->id;
        $book = Book::where('id', $id)->first();

        if($book->user_id != Auth::user()->id){
            return redirect()->route('books');
        }

        return $next($request);
    }
}
