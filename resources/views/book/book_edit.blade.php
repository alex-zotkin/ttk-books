@extends('layout')
@section('css', '/css/book/book_edit.css')
@section('title', 'Редактирование ' . $book->title)

@section('content')

    <a href={{ route('books') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form method="POST" action={{ route('book_save', ['id'=>$book->id]) }}>
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <img src={{$book->image}} class="book_img"/>
        <label>
            Ссылка на изображение:
            <input type="text" value={{$book->image}} name="image" required>
        </label>

        <label>
            Название:
            <input type="text" value='{{$book->title}}' name="title" required>
        </label>

        <label>
            Автор:
            <select name="author" required>
                @foreach ($authors as $author)
                    <option value={{$author->id}} @selected($book->author_id == $author->id)>
                        {{$author->name}}
                    </option>
                @endforeach
            </select>
        </label>


        <label>
            Категория:
            <select name="category" required>
                @foreach ($categories as $category)
                    <option value={{$category->id}} @selected($book->category_id == $category->id)>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </label>


        <label>
            Год издания:
            <input type="number" name="year" value={{$book->year}} min="0" max={{date("Y")}} required>
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{$book->description}}</textarea>


        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
