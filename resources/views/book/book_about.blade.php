@extends('layout')
@section('css', '/css/book/book_about.css')
@section('title', $book->title)

@section('content')

    <a href={{ route('books') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <div class="book">
        <img src={{$book->image}} class="book_img">

        <h2>{{$book->title}}</h2>
        <a href={{ route('author_about', ['id'=>$book->author_id]) }}>
            {{$book->author->name}}
        </a>
        <p>Раздел: <a href={{ route('category_about', ['id'=>$book->category_id]) }}>
            {{$book->category->title}}
        </a></p>
        <i>{{$book->year}}</i>

        <p>{{$book->description}}</p>

        <p>Опубликовал {{$book->user->email}}</p>
        <p>Дата публикации {{$book->created_at}}</p>

        @can('edit_book', $book)
            <a href={{route('book_edit', ['id' => $book->id])}} class="button_green">Редактировать</a>
            <a href={{route('book_delete', ['id' => $book->id])}} class="button_red">Удалить</a>
        @endcan
    </div>

@endsection
