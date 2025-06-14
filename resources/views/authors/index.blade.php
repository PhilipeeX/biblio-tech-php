@extends('layouts.app')

@section('content')
  <h1>Autores</h1>

  <a href="{{ route('authors.create') }}" class="btn">+ Cadastrar novo autor</a>

  <table>
    <tr>
      <th>Autor</th>
      <th>Opções</th>
    </tr>
    @foreach($authors as $author)
      <tr>
        <td>{{ $author->name }}</td>
        <td>
          <a href="{{ route('author', $author->id) }}" class="btn">detalhes</a>
          <a href="{{ route('author.edit', $author->id) }}" class="btn">editar</a>
        </td>
      </tr>
    @endforeach
  </table>
@endsection
