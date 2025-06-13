<div class="container">
  <h1>Editar Autor</h1>

  <form action="{{ route('author.update', $author->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group mb-3">
      <label for="name" class="form-label">Nome:</label>
      <input type="text"
             class="form-control @error('name') is-invalid @enderror"
             id="name"
             name="name"
             value="{{ old('name', $author->name) }}"
             required>
      @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Atualizar</button>
      <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
  </form>
</div>
