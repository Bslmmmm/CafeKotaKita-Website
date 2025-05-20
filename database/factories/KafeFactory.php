<?php

namespace Database\Factories;

use App\Models\Kafe;
use Illuminate\Database\Eloquent\Factories\Factory;


class KafeFactory extends Factory
{
    protected $model = Kafe::class;
    public function definition(): array
    {
        $cafeNames = [
            'Kopi Kenangan', 'Janji Jiwa', 'Kopi Senja', 'Kopi Nusantara', 'Cafe Aroma',
            'Kopi Bos',  'Hidden Gem Cafe', 'Kopi Mandalika',
            'Daily Grind', 'Espresso Haven', 'Brew & Chill', 'Morning Buzz', 'Sunset Sips',
            'Mocha Mood', 'Caffeine Hub', 'Velvet Beans', 'Rustic Coffee', 'The Cozy Cup',
            'Golden Mug', 'Steamy Beans', 'Perk Up Cafe', 'Lush Latte', 'Frothy Delights',
            'Sweet Aroma', 'Midnight Brews', 'Tranquil Cafe', 'Harvest Roast', 'Nomad Coffee'
        ];
        return [
            'nama' => $this->faker->unique()->randomElement($cafeNames),
            'alamat' => $this->faker->address(),
            'telp' => $this->faker->e164PhoneNumber(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'jam_buka' => $this->faker->time('H:i'),
            'jam_tutup' => $this->faker->time('H:i'),
        ];
    }
}
