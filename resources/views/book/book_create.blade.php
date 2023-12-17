@extends('layout')
@section('css', '/css/book/book_edit.css')
@section('title', 'Добавление книги')

@section('content')

    <a href={{ route('books') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="book" method="POST" action={{ route('book_store') }}>
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <label>
            Ссылка на изображение:
            <input type="text" name="image" required value="{{old('image')}}">
        </label>

        <label>
            Название:
            <input type="text" name="title" required value="{{old('title')}}">
        </label>

        <label>
            Автор:
            <select name="author" required>
                @foreach ($authors as $author)
                    <option value={{$author->id}}>
                        {{$author->name}}
                    </option>
                @endforeach
            </select>
        </label>


        <label>
            Категория:
            <select name="category" required>
                @foreach ($categories as $category)
                    <option value={{$category->id}}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </label>


        <label>
            Год издания:
            <input type="number" name="year" min="0" max={{date("Y")}} required  value="{{old('year')}}">
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{old('description')}}</textarea>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
