@extends('layout')

@section('title', 'Книги')

@section('content')
    <h1>Книги</h1>

    @can('auth')
        <a href={{route('book_create')}} class="button_green" style="margin-bottom: 15px;">Добавить новую книгу +</a>
    @endcan()

    @include('book.book_list', compact('books'))

    {{$books->links()}}

@endsection
