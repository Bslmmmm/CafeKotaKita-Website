<?php

namespace Database\Seeders;

use App\Models\Kafe;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class KafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = Owner::all();

        Kafe::factory()
            ->count(28)
            ->create([
                "owner_id" => $owner[0]->id
            ]);
    }
}
