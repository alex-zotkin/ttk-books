@extends('layout')
@section('css', '/css/author/author_edit.css')
@section('title', 'Профиль ' . auth()->user()->email)

@section('content')
    <a href={{ route('books') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <form class="author_form" method="POST" action={{ route('profile_update') }}>
        @csrf
        <h1>Изменение данных: {{auth()->user()->email}}</h1>

        <label>
            Обновление пароля:
            <input type="password" name="password">
        </label>

        <label style="flex-direction: row; width: 200px;">
            Администратор?:
            <input type="checkbox" @checked(auth()->user()->isAdmin) name="isAdmin">
        </label>

        <button type="submit" class="button_green">Сохранить</button>
    </form>


    <h1>Ваши книги:</h1>

    @include('book.book_list', compact('books'))


@endsection
