<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de autores</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
    }

    h1 {
      color: #333;
      border-bottom: 2px solid #007bff;
      padding-bottom: 10px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #333;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
    }

    input[type="text"]:focus {
      border-color: #007bff;
      outline: none;
    }

    .btn {
      background: #007bff;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
      display: inline-block;
    }

    .btn:hover {
      background: #0056b3;
    }

    .btn-secondary {
      background: #6c757d;
      margin-left: 10px;
    }

    .btn-secondary:hover {
      background: #545b62;
    }

    .error {
      color: #dc3545;
      font-size: 14px;
      margin-top: 5px;
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 4px;
    }

    .alert-danger {
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Cadastro de autores</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul style="margin: 0; padding-left: 20px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('authors.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="name">Author Name:</label>
      <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name') }}"
        placeholder="Enter author name"
        required
      >
      @error('name')
      <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <button type="submit" class="btn">Create Author</button>
      <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
  <hr>
  <a href="{{ route('authors.index') }}" class="btn"> Voltar para autores</a>
</div>
</body>
</html>
