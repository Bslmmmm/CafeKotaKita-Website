<?php

namespace Database\Seeders;

use App\Models\Kafe;
use App\Models\Menu;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{


    public function run(): void
    {
        Owner::create([
            "user_id" => User::get()->first()->id,
            "status" => "pending"
        ]);
    }
}
