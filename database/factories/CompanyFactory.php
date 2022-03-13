<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
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
