<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarrentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'name' => $this->faker->company(),
                'adress' => $this->faker->address() ,
                'contact' => $this->faker->lastName()." ". $this->faker->name()
            ];

    }
}
