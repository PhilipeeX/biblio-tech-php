<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
  use RefreshDatabase;

  public function test_index_displays_all_authors(): void
  {
    // DADO:
    // que temos 3 autores no banco de dados
    Author::factory()->count(3)->create();

    // QUANDO:
    // executarmos a requisição para a rota de index dos autores
    $response = $this->get('/autores');

    // ENTAO:
    // receberemos status ok, veremos a view index, teremos o array com autores e a quantidade de autores será a mesma do banco
    $response->assertOk();
    $response->assertViewIs('authors.index');
    $response->assertViewHas('authors');

    $authors = $response->viewData('authors');
    $this->assertCount(3, $authors);
  }
}
