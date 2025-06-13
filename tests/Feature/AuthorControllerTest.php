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

  public function test_store_creates_author_with_valid_data(): void
  {
    // DADO: que temos o parâmetro preenchido no campo name para cadastrar o autor.
    $authorData = [
      'name' => 'Bruno Silva'
    ];

    // QUANDO: realizarmos a requisição clicando no botão 'submit'
    $response = $this->post('/autor', $authorData);

    /** ENTAO Verifica se:
        redirecionou corretamente;
        tem a mensagem de sucesso na sessão;
        o autor foi criado no banco;
     *  existe exatamente 1 autor no banco;
     **/
    $response->assertRedirect(route('authors.index'));
    $response->assertSessionHas('success', 'Autor cadastrado com sucesso!');
    $this->assertDatabaseHas('authors', [
      'name' => 'Bruno Silva'
    ]);
    $this->assertCount(1, Author::all());
  }

  public function test_store_fails_with_empty_name(): void
  {
    /*DADO:
      que usuário não preencheu o nome no campo do formulário

      QUANDO a requisição for feita com o parametro name vazio
    */
    $response = $this->post('/autor', [
      'name' => ''
    ]);

    /*ENTAO Verifica se:
      retornou erro de validação;
      NÃO criou nenhum autor
    */

    $response->assertSessionHasErrors(['name']);
    $this->assertCount(0, Author::all());
  }

  public function test_store_fails_with_missing_name(): void
  {
    $response = $this->post('/autor', []);

    $response->assertSessionHasErrors(['name']);
    $this->assertCount(0, Author::all());
  }

  public function test_store_fails_with_name_too_long(): void
  {
    /*DADO que usuário preencheu o campo com limite maior de caracteres do que o permitido
      QUANDO fizer a requisição
    */
    $response = $this->post('/autor', [
      'name' => str_repeat('a', 256)
    ]);

    /*ENTAO verifica se:
      erros foram lançados nas validações do campo name;
      o número de autores no banco continua vazio;
    */
    $response->assertSessionHasErrors(['name']);
    $this->assertCount(0, Author::all());
  }

  public function test_show(): void
  {
    Author::factory()->create(['name'=>'Rodrigo']);
    $philipeId = Author::factory()->create(['name'=>'Philipe'])->id;

    $response = $this->get("/autor/{$philipeId}");

    $response->assertOk();
    $response->assertViewIs('authors.show');
    $author = $response->viewData('author');

    $this->assertEquals('Philipe', $author->name);
  }

  public function test_update(): void
  {
    $author = Author::factory()->create(['name'=>'Fernando Torres']);
    $authorData = ['name' => 'José Antunes'];

    $response = $this->patch("/autor/{$author->id}", $authorData);

    $response->assertRedirect();
    $response->assertSessionHas('success', 'Autor atualizado com sucesso!');
    $this->assertDatabaseMissing('authors', ['name' => 'Fernando Torres']);
    $this->assertCount(1, Author::all());
  }

  /*
  * Valida se não permite cadastrar autor com caracteres especiais e/ou números no nome
  */
  public function test_update_author_with_numbers_in_name_fails(): void
  {
    $author = Author::factory()->create(['name' => 'Fernando Torres']);
    $invalidData = ['name' => 'José123'];

    $response = $this->patch("/autor/{$author->id}", $invalidData);

    $response->assertSessionHasErrors(['name']);
    $response->assertRedirect();

    $this->assertDatabaseHas('authors', [
      'id' => $author->id,
      'name' => 'Fernando Torres'
    ]);
    $this->assertDatabaseMissing('authors', ['name' => 'José123']);
    $this->assertCount(1, Author::all());
  }

  public function test_destroy(): void
  {
    $author = Author::factory()->create(['name'=>'Fernando Torres']);

    $response = $this->delete("/autor/{$author->id}");

    $response->assertRedirect();
    $this->assertDatabaseMissing('authors', ['name' => 'Fernando Torres']);
    $this->assertCount(0, Author::all());
  }
}
