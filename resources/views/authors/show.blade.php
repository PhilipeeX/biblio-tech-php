@extends('layouts.app')

@section('content')
  <h1>Você está na página de detalhes do autor</h1>
  {{ $author->name }}

  <a href="{{ route('author.edit', [$author->id]) }}" class="btn"> editar </a>      |
  <form action="{{ route('author.destroy', $author->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"
            onclick="return confirm('Tem certeza que deseja excluir este autor?')">
      Excluir
    </button>
  </form>
  <br>
  <a href="{{ route('authors.index') }}" class="btn">Voltar para autores</a>
@endsection
