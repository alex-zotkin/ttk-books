<link rel="stylesheet" href="/css/author/author_list.css">

<ul class="authors_list">
    @foreach ($authors as $author)
        <li class="author">
            <a href={{ route('author_about', ['id'=>$author->id]) }}>
                <div class="author_img" style="background-image: url('{{$author->image}}')"></div>
            </a>
            <h2><a href={{ route('author_about', ['id'=>$author->id]) }}>
                    {{$author->name}}
                </a>
            </h2>

            <i>{{$author->country}}</i>

            <p>{{$author->description}}</p>

            @can('admin')
                <a href={{route('author_edit', ['id' => $author->id])}} class="button_green">Редактировать</a>
                <a href={{route('author_delete', ['id' => $author->id])}} class="button_red">Удалить</a>
            @endcan
        </li>
    @endforeach


    @if (count($authors) == 0)
        <p>Пока не добавлено ни одного автора</p>
    @endif
</ul>
