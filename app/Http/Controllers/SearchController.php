<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

/*
    Контроллер по реализации страницы поиска
    Поиск осуществляется по названиям книг, именам авторов и их книг
*/

class SearchController extends Controller
{
    //Обработка запроса и возвращение страницы поиска и
    function index(Request $request){
        $value = $request->get('value');

        //Поиск по именам авторов
        $authors = Author::where('name', 'like', '%' . $value . '%')->orderBy("updated_at", "desc")->get();

        //Поиск по названиям книг
        $books = Book::where('title', 'like', '%' . $value . '%');
        //Поиск всех книг уже найденных ранее авторов
        foreach ($authors as $author) {
            $books->orWhere('author_id', $author->id);
        }
        $books = $books->orderBy("updated_at", "desc")->get();

        return view('search.search', compact('books', 'authors', 'value'));
    }
}
