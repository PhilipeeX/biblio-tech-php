<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::firstOrCreate(['name' => 'J.K. Rowling']);
        Author::firstOrCreate(['name' => 'George R.R. Martin']);
        Author::firstOrCreate(['name' => 'J.R.R. Tolkien']);
    }
}
