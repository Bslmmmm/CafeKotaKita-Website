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
            ['id' => Str::uuid(), 'nama' => 'Co-Working Space'],
            ['id' => Str::uuid(), 'nama' => 'Modern'],
            ['id' => Str::uuid(), 'nama' => 'Pet-Friendly'],
            ['id' => Str::uuid(), 'nama' => 'View-Oriented'],
            ['id' => Str::uuid(), 'nama' => 'Keluarga'],
            ['id' => Str::uuid(), 'nama' => 'Coffee Specialty'],
            ['id' => Str::uuid(), 'nama' => 'Rooftop'],
            ['id' => Str::uuid(), 'nama' => 'Nature'],
            ['id' => Str::uuid(), 'nama' => 'Industrial'],
            ['id' => Str::uuid(), 'nama' => 'Jepang'],
            ['id' => Str::uuid(), 'nama' => 'Tea House'],
            ['id' => Str::uuid(), 'nama' => 'Outdoor'],


        ];

        // Using insert method to avoid model events
        Genre::insert($genres);
    }
}
