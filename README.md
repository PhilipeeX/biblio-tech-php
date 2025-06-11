# BiblioTech-php

Bem-vindo ao BiblioTech-php, um projeto para aprender PHP Laravel baseado em outro projeto que eu fiz há alguns anos para aprender ruby onn rails

## Pré-requisitos

- PHP 8.1 ou superior
- Composer
- SQLite (já vem com PHP) ou MySQL

## Funcionalidades para Implementar

[ ] **CRUDs**
- [ ] Cadastrar Autores
- [ ] Cadastrar Livros vinculando com Autor
- [ ] Cadastrar Fornecedores com uma Conta
- [ ] Cadastrar Peças vinculando com Fornecedor
- [ ] Cadastrar Montagens com várias Peças e vinculando com Livro

[ ] **APIs**
- [ ] Cadastrar Autores
- [ ] Cadastrar Livros vinculando com Autor
- [ ] Cadastrar Fornecedores com uma Conta
- [ ] Cadastrar Peças vinculando com Fornecedor
- [ ] Cadastrar Montagens com várias Peças e vinculando com Livro

[ ] **Roles (Regras)**
- [ ] Alterar
    - [ ] Adicionar campo CNPJ em Fornecedor
    - [ ] Adicionar campo Dígito Verificador em Conta
    - [ ] Adicionar campo ISBN em Livro
    - [ ] Adicionar campo CPF em Autor
- [ ] Calcular
    - [ ] Dígito Verificador em Conta (pesquisar como calcular esse dígito verificador)
- [ ] Validar
    - [ ] CNPJ em Fornecedor
    - [ ] ISBN em Livro
    - [ ] CPF em Autor

[ ] **Filtros**
- [ ] Adicionar
    - [ ] Campo título em Livro
    - [ ] Campo nome em Peça
- [ ] Filtrar
    - [ ] Fornecedor por nome
    - [ ] Fornecedor por número da conta em Conta
    - [ ] Livros por título
    - [ ] Livros por nome em Autor
    - [ ] Montagem por nome em Peça
    - [ ] Fornecedor por nome do Autor

[ ] **Relatórios**
- [ ] Adicionar
    - [ ] Campo valor em Peça
- [ ] Relatório
    - [ ] Autor (com todas as informações com seu Livros (com todas as informações) e o total de Livros publicado
    - [ ] Fornecedor (com todas as informações) com todos os autores (com todas as informações) e livros (com todas as informações)
    - [ ] Livro com a montagem (com todas as informações) com suas peças (com todas as informações), o total de peças e o custo total da montagem
## Estrutura do Projeto

```
app/
├── Http/Controllers/     # Controllers
├── Models/              # Models (Autor, Livro, etc)
database/
├── migrations/          # Arquivos de migração
├── seeders/            # Dados de exemplo
resources/
├── views/              # Templates Blade
routes/
├── web.php             # Rotas web
├── api.php             # Rotas da API
tests/
├── Feature/            # Testes de funcionalidade
├── Unit/               # Testes unitários
```

## Aprendizado Passo a Passo

Cada entidade terá:
- Migration
- Model
- Controller
- Views (formulários e listagens)
- Testes (para garantir a entrega com qualidade)
