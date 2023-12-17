@extends('layout')
@section('css', '/css/search/search.css')


@section('content')

    <h1 class="search_value">Результаты по запросу: {{$value}}</h1>

    @if (count($authors) == 0 || $value == "")
        <h1>Авторы по запросу не найдены</h1>
    @else
        <h1>Авторы</h1>
        @include('author.author_list', compact('authors'))
    @endif


    @if (count($books) == 0 || $value == "")
        <h1>Книги по запросу не найдены</h1>
    @else
        <h1>Книги</h1>
        @include('book.book_list', compact('books'))
    @endif

@endsection
