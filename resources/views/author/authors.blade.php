@extends('layout')

@section('title', 'Авторы')

@section('content')

    <h1>Авторы</h1>

    @can('admin')
        <a href={{route('author_create')}} class="button_green" style="margin-bottom: 15px;">Добавить нового автора +</a>
    @endcan

    @include('author.author_list', compact('authors'))

    {{$authors->links()}}
@endsection
