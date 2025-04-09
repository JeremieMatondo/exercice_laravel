<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = fake()->numberBetween(2,10);
        return [
            'title'=>fake()->sentence(6,true),
            'description'=>fake()->sentences(4,true),
            'surface'=>fake()->numberBetween(20,400),
            'rooms'=>$rooms,
            'surface'=>fake()->numberBetween(1,$rooms),
            'floor'=>fake()->numberBetween(10000,100000),
            'city'=>fake()->city(),
            'adress'=>fake()->address(),
            'postal_code'=>fake()->postcode(),
            'sold'=>false,

        ];
    }
    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
