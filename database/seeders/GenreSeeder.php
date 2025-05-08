<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'id' => Str::uuid(),
                'nama' => 'Tradisional'
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Retro'
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Sci Fi'
            ],
            ['id' => Str::uuid(), 'nama' => 'Kantor'],
            ['id' => Str::uuid(), 'nama' => 'Romance'],
            ['id' => Str::uuid(), 'nama' => 'Modern']
        ];

        // Using insert method to avoid model events
        Genre::insert($genres);
    }
}
