<link rel="stylesheet" href="/css/book/book_list.css">

<ul class="books_list">
    @foreach ($books as $book)
        <li class="book">
            <a href={{ route('book_about', ['id'=>$book->id]) }}>
                <img src={{$book->image}}>
            </a>
            <h2><a href={{ route('book_about', ['id'=>$book->id]) }}>
                {{$book->title}}
                </a>
            </h2>

            <a href={{ route('author_about', ['id'=>$book->author_id]) }}>
                {{$book->author->name}}
            </a>

            <p>Раздел: <a href={{ route('category_about', ['id'=>$book->category_id]) }}>
                {{$book->category->title}}
                </a>
            </p>

            <i>{{$book->year}}</i>

            <p>{{$book->description}}</p>

            @can('edit_book', $book)
                <a href={{route('book_edit', ['id' => $book->id])}} class="button_green">Редактировать</a>
                <a href={{route('book_delete', ['id' => $book->id])}} class="button_red">Удалить</a>
            @endcan

        </li>
    @endforeach


    @if (count($books) == 0)
        <p>Пока не добавлено ни одной книги</p>
    @endif
</ul>
