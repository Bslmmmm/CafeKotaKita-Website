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
                'id' => 'd007a5fd-11fc-45f8-8f1f-e2c827301cb6',
                'nama' => 'Tradisional'
            ],
            [
                'id' => '58b459d8-701a-4614-8395-346e65cd7552',
                'nama' => 'Retro'
            ],
            [
                'id' => 'af022268-e4fc-43a9-a3b0-44731a9b5227',
                'nama' => 'Co-Working Space'
            ],
            [
                'id' => '4990e08f-02b9-48e1-b6bc-66e65838a9b1',
                'nama' => 'Modern'
            ],
            [
                'id' => 'a11e17c2-2e35-4396-858b-eb9498b7d9a8',
                'nama' => 'Pet-Friendly'
            ],
            [
                'id' => '871eee6c-07db-453f-8f3c-c9d5d8c3a647',
                'nama' => 'View-Oriented'
            ],
            [
                'id' => 'abe97ac3-8a22-4f9a-ac9b-3a2fc6ac5e9d',
                'nama' => 'Keluarga'
            ],
            [
                'id' => '2897bfe1-11de-4af8-9bd8-d5cfb5b112a3',
                'nama' => 'Coffee Specialty'
            ],
            [
                'id' => '7467fb17-e322-4e06-bcbd-b4e5507af08d',
                'nama' => 'Rooftop'
            ],
            [
                'id' => '8725d300-1b0c-4e6a-81cc-d1eb167c1a1b',
                'nama' => 'Nature'
            ],
            [
                'id' => 'fce48d48-05fa-4b73-83dc-b1777be9be6f',
                'nama' => 'Industrial'
            ],
            [
                'id' => '927298d9-afb5-4355-8296-471289741eb6',
                'nama' => 'Jepang'
            ],
            [
                'id' => 'a00985eb-83c3-49fd-b45d-903e34a5d76e',
                'nama' => 'Tea House'
            ],
            [
                'id' => 'c7f04faf-b035-46d2-ba85-27fcbd8b5483',
                'nama' => 'Outdoor'
            ],


        ];

        // Using insert method to avoid model events
        Genre::insert($genres);
    }
}
