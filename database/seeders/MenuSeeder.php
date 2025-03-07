<?php

namespace Database\Seeders;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    

    public function run(): void
    {
        $menuNames = [
            'Espresso', 'Cappuccino', 'Latte', 'Mocha', 'Americano',
            'Affogato', 'Macchiato', 'Flat White', 'Cold Brew', 'Matcha Latte',
            'Croissant', 'Tiramisu', 'Pancake', 'Cheesecake', 'Brownies',
            'Black Bean Coffee', 'Tropical Latte',
        ];
        $kafe = Kafe::all();
        foreach ($kafe as $k) {
            $shuffledMenus = collect($menuNames)->shuffle();

            foreach ($shuffledMenus as $menuName) {
                Menu::factory()->create([
                    'kafe_id' => $k->id,
                    'nama' => $menuName,
                ]);
            }
        }
    }
}
