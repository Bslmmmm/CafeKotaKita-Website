<?php

namespace Database\Seeders;

use App\Models\Kafe;
use Illuminate\Database\Seeder;

class KafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kafe::factory()
            ->count(28)
            ->create();
    }
}
