<?php

namespace Database\Factories;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    protected $model = Menu::class;
    
    public function definition(): array
    {
        
        return [
            'kafe_id' => null,
            'nama' => $this->faker->unique()->word(),
            'harga' => $this->faker->numberBetween(10000, 50000),
            'status' => $this->faker->randomElement(['tersedia', 'habis']),
        ];
    }
}
