<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->create([
            'firstname' => 'Herbert',
            'lastname' => 'Wells'
        ]);

        Author::factory()->create([
            'firstname' => 'Abish',
            'lastname' => 'Kekilbayev'
        ]);

        Author::factory()->create([
            'firstname' => 'Joanne',
            'lastname' => 'Rolling'
        ]);
    }
}
