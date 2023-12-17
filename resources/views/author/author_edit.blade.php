@extends('layout')
@section('css', '/css/author/author_edit.css')
@section('title', 'Редактирование ' . $author->name)

@section('content')
    <a href={{ route('authors') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form method="POST" action={{ route('author_save', ['id'=>$author->id]) }}>
        @csrf

        @foreach ($errors->all() as $error)
            <div class="error">
                {{$error}}
            </div>
        @endforeach

        <img src={{$author->image}} class="author_img"/>
        <label>
            Ссылка на изображение:
            <input type="text" value={{$author->image}} name="image" required>
        </label>

        <label>
            Имя:
            <input type="text" value='{{$author->name}}' name="name" required>
        </label>


        <label>
            Страна:
            <input type="text" name="country" value={{$author->country}} required>
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{$author->description}}</textarea>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
