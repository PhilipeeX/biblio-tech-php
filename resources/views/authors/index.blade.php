<h1>Autores</h1>

<ul>
    @foreach($authors as $author)
        <li>{{ $author->name }} | <a href="{{ route('author', [$author->id]) }}" class="btn"> detalhes </a></li>
    @endforeach
</ul>

<a href="{{ route('authors.create') }}" class="btn">+ Cadastrar novo autor</a>
