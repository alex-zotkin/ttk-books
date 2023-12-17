@extends('layout')
@section('css', '/css/author/author_edit.css')
@section('title', 'Добавление автора')

@section('content')
    <a href={{ route('authors') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="author_form" method="POST" action={{ route('author_store')}}>
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
            Имя:
            <input type="text" name="name" required value="{{old('name')}}">
        </label>


        <label>
            Страна:
            <input type="text" name="country" required value="{{old('country')}}">
        </label>

        <label>
            Описание:
            <textarea name="description" cols="50" rows="10" required>{{old('description')}}</textarea>
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>

@endsection
