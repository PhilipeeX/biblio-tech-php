<h1>Authors</h1>

<ul>
    @foreach($authors as $author)
        <li>{{ $author->name }}</li>
    @endforeach
</ul>

<a href="{{ route('authors.create') }}" class="btn">+ Cadastrar novo autor</a>
