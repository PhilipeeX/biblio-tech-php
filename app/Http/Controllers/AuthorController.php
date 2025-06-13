<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
  {
    $authors = Author::all();
    return view('authors.index', compact('authors'));
  }

  public function create()
  {
    return view('authors.create');
  }

  public function store(Request $request)
  {
    $request->validate($this->paramsValidate(), $this->getValidationMessages());

    Author::create(['name' => $request->name]);

    return redirect()->route('authors.index')
      ->with('success', 'Autor cadastrado com sucesso!');
  }

  public function show(string $id)
  {
    $author = Author::FindOrFail($id);

    return view('authors.show', compact('author'));
  }

  public function edit(string $id)
  {
    $author = Author::FindOrFail($id);

    return view('authors.edit', compact('author'));
  }

  public function update(Request $request, string $id)
  {
    $request->validate($this->paramsValidate(), $this->getValidationMessages());

    $author = Author::findOrFail($id);
    $author->update(['name' => $request->name]);

    return redirect()->route('author', $author->id)
      ->with('success', 'Autor atualizado com sucesso!');
  }

  public function destroy(string $id)
  {
    $author = Author::findOrFail($id);
    $author->delete();

    return redirect()->route('authors.index')
      ->with('success', 'Autor removido com sucesso!');
  }

  private function paramsValidate()
  {
    return [
      'name' => [
        'required',
        'string',
        'max:255',
        'regex:/^[a-zA-ZÀ-ÿñÑ\s\.\-\']+$/u'
      ]
    ];
  }

  private function getValidationMessages()
  {
    return [
      'name.regex' => 'O nome deve conter apenas letras, espaços, pontos, hífens e apóstrofes.'
    ];
  }
}
