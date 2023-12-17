@extends('layout')
@section('css', '/css/author/author_about.css')
@section('title', $author->name)

@section('content')
    <a href={{ route('authors') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <div class="author">
        <a href="">
            <div class="author_img" style="background-image: url('{{$author->image}}')"></div>
        </a>
        <h2>{{$author->name}}</h2>
        <i>{{$author->country}}</i>

        <p>{{$author->description}}</p>

        @can('admin')
            <a href={{route('author_edit', ['id' => $author->id])}} class="button_green">Редактировать</a>
            <a href={{route('author_delete', ['id' => $author->id])}} class="button_red">Удалить</a>
        @endcan
    </div>

    <h1>Книги автора:</h1>

    @include('book.book_list', ['books' => $author->books])

@endsection
