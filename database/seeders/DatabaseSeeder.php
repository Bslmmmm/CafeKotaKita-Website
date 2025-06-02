<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            OwnerSeeder::class,
            GenreSeeder::class,
            FasilitasSeeder::class,
            KafeSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
