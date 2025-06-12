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
    $request->validate([
      'name' => 'required|string|max:255'
    ]);

    Author::create([
      'name' => $request->name,
    ]);

    return redirect()->route('authors.index')
      ->with('success', 'Author created successfully!');
  }

  public function show(string $id)
  {
    $author = Author::FindOrFail($id);

    return view('authors.show', compact('author'));
  }

  public function edit(string $id)
  {
    //
  }

  public function update(Request $request, string $id)
  {
    //
  }

  public function destroy(string $id)
  {
    //
  }
}
