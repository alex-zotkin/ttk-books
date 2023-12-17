@extends('layout')
@section('css', '/css/category/category_about.css')
@section('title', $category->title)

@section('content')
    <a href={{ route('categories') }}>
        <ion-icon class="section_back" name="arrow-back-outline"></ion-icon>
    </a>

    <div class="category">
        <h2>{{$category->title}}</h2>

        <p>{{$category->description}}</p>
        @can('admin')
            <a href={{route('category_edit', ['id' => $category->id])}} class="button_green">Редактировать</a>
            <a href={{route('category_delete', ['id' => $category->id])}} class="button_red">Удалить</a>
        @endcan
    </div>

    <h1>Книги в категории:</h1>

    @include('book.book_list', ['books' => $category->books])

@endsection
