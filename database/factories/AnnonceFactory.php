<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->lastName(),
            'picture' => 'default_picture' . rand(1,7) . '.jpg',
            'year' => rand(2000,2023),
            'km' => round(rand(100000, 200000), -3), // Arrondir au millier le plus proche (-3 pour les milliers)
            'fuel' => Arr::random(['essence', 'diesel', 'ethanol', 'GPL', 'electrique']),
            'price' => round(rand(1200, 5000), -2),
            'description' => $this->faker->paragraph(1, true),
            'status' => $this->faker->randomElement([0, 1]),
            'date_sold' => null,
        ];
    }
}
