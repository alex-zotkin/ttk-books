<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

/*
    Контроллер для обработки запросов об авторах
*/

class AuthorController extends Controller
{
    //Страница авторов
    function index(){
        $authors = Author::orderBy('updated_at', 'desc')->paginate(5);
        return view('author.authors', compact('authors'));
    }

    //Страница конкретного автора по индексу
    function about($id){
        $author = Author::where('id', $id)->first();
        return view('author.author_about', compact('author'));
    }

    //Страница создания авторов
    function create(){
        return view('author.author_create');
    }

    //Обработка запроса и сохранение в бд нового автора
    function store(Request $request){
        $input = $request->validate([
            'name' => 'required|min:5|string',
            'country' => 'required|string',
            'image' => 'required',
            'description' => 'required|min:10',
        ]);

        $author = new Author;
        $author->name = $input['name'];
        $author->image = $input['image'];
        $author->country = $input['country'];
        $author->description = $input['description'];

        $author->save();

        return redirect()->route('authors');
    }

    //Редактирование автора по индексу
    function edit($id){
        $author = Author::where('id', $id)->first();
        return view('author.author_edit', compact('author'));
    }

    //Сохранение информации об авторе после редактирования
    function save(Request $request, $id){
        $input = $request->validate([
            'name' => 'required|min:5|string',
            'country' => 'required|string',
            'image' => 'required',
            'description' => 'required|min:10',
        ]);

        $author = Author::where('id', $id)->first();
        $author->name = $input['name'];
        $author->image = $input['image'];
        $author->country = $input['country'];
        $author->description = $input['description'];

        $author->save();

        return redirect()->route('authors');
    }

    //Удаление автора по индексу
    function delete($id){
        $author = Author::where('id', $id)->first();
        $author->delete();
        return redirect()->route('authors');
    }
}
