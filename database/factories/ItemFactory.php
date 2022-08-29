<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barcode_number' => $this->faker->name(),
            'name' => $this->faker->unique()->name(),
            'price' => mt_rand(10000,20000),
            'created_at' => now(),
            'updated_at' => now()            
        ];
    }
}
