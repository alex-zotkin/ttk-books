<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;


/*
    Контроллер для обработки запросов об авторах
*/

class BookController extends Controller
{
     //Страница списка книг
    function index(){
        $books = Book::orderBy('updated_at', 'desc')->paginate(5);
        return view('book.books', compact('books'));
    }

    //Страница конкретной книги по индексу
    function about($id){
        $book = Book::where('id', $id)->first();
        return view('book.book_about', compact('book'));
    }

    //Страница создания книги
    function create(){
        $authors = Author::all();
        $categories = Category::all();

        return view('book.book_create', compact('authors', 'categories'));
    }

    //Обработка запроса и сохранение в бд новой книги
    function store(Request $request){
        $input = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'year' => 'required|integer',
            'author' => 'required|integer',
            'category' => 'required|integer',
            'description' => 'required|string|min:10',
        ]);

        $book = new Book;
        $book->title = $input['title'];
        $book->image = $input['image'];
        $book->year = $input['year'];
        $book->author_id = $input['author'];
        $book->category_id = $input['category'];
        $book->description = $input['description'];
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('book_about', ['id' => $book->id]);
    }

    //Редактирование книги по индексу
    function edit($id){
        $book = Book::where('id', $id)->first();
        $authors = Author::all();
        $categories = Category::all();

        return view('book.book_edit', compact('book', 'authors', 'categories'));
    }

    //Сохранение информации о книги после редактирования
    function save(Request $request, $id){
        $input = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'year' => 'required|integer',
            'author' => 'required|integer',
            'category' => 'required|integer',
            'description' => 'required|string|min:10',
        ]);

        $book = Book::where('id', $id)->first();
        $book->title = $input['title'];
        $book->image = $input['image'];
        $book->year = $input['year'];
        $book->author_id = $input['author'];
        $book->category_id = $input['category'];
        $book->description = $input['description'];
        $book->save();

        return redirect()->route('book_about', ['id' => $id]);
    }

    //Удаление книги по индексу
    function delete($id){
        $book = Book::where('id', $id)->first();
        $book->delete();

        return redirect()->route('books');
    }
}
