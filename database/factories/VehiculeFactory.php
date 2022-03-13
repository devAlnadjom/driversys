<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'carrental_id' => rand(1,10),
            'model' => $this->faker->randomElement(["Odysse 2022","Chevrolet 2018","Caravann 2022","Corolla 2020"]) ,
            'nplace' => rand(1,10)
        ];
    }
}
