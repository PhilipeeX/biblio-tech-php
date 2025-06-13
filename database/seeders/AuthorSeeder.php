<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
      Author::truncate();
      Author::firstOrCreate(['name' => 'Isaac Asimov']);
      Author::firstOrCreate(['name' => 'Arthur C. Clarke']);
      Author::firstOrCreate(['name' => 'Robert A. Heinlein']);
      Author::firstOrCreate(['name' => 'Philip K. Dick']);
      Author::firstOrCreate(['name' => 'Frank Herbert']);
      Author::firstOrCreate(['name' => 'Ray Bradbury']);
      Author::firstOrCreate(['name' => 'Ursula K. Le Guin']);

      Author::firstOrCreate(['name' => 'H.G. Wells']);
      Author::firstOrCreate(['name' => 'Jules Verne']);
      Author::firstOrCreate(['name' => 'Edgar Rice Burroughs']);
      Author::firstOrCreate(['name' => 'E.E. "Doc" Smith']);
      Author::firstOrCreate(['name' => 'John W. Campbell Jr.']);

      Author::firstOrCreate(['name' => 'William Gibson']);
      Author::firstOrCreate(['name' => 'Neal Stephenson']);
      Author::firstOrCreate(['name' => 'Bruce Sterling']);
      Author::firstOrCreate(['name' => 'Rudy Rucker']);
      Author::firstOrCreate(['name' => 'Pat Cadigan']);

      Author::firstOrCreate(['name' => 'Alastair Reynolds']);
      Author::firstOrCreate(['name' => 'Kim Stanley Robinson']);
      Author::firstOrCreate(['name' => 'Dan Simmons']);
      Author::firstOrCreate(['name' => 'Iain M. Banks']);
      Author::firstOrCreate(['name' => 'Larry Niven']);
      Author::firstOrCreate(['name' => 'Poul Anderson']);
      Author::firstOrCreate(['name' => 'Gregory Benford']);

      Author::firstOrCreate(['name' => 'Liu Cixin']);
      Author::firstOrCreate(['name' => 'Andy Weir']);
      Author::firstOrCreate(['name' => 'Martha Wells']);
      Author::firstOrCreate(['name' => 'Becky Chambers']);
      Author::firstOrCreate(['name' => 'James S.A. Corey']);
      Author::firstOrCreate(['name' => 'Ann Leckie']);
      Author::firstOrCreate(['name' => 'Jeff VanderMeer']);

      Author::firstOrCreate(['name' => 'Kurt Vonnegut']);
      Author::firstOrCreate(['name' => 'Stanisław Lem']);
      Author::firstOrCreate(['name' => 'Douglas Adams']);
      Author::firstOrCreate(['name' => 'Octavia E. Butler']);
      Author::firstOrCreate(['name' => 'Gene Wolfe']);
      Author::firstOrCreate(['name' => 'J.G. Ballard']);
      Author::firstOrCreate(['name' => 'Cordwainer Smith']);
    }
}
