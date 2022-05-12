<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
       
        return [
            'id_user'=>19,
            'tanggal' =>$this->faker->date(),
            'jam' => $this->faker->time(),
            'lokasi'=>$this->faker->address(),
            'suhu'=>$this->faker->numberBetween(26, 55),  
        ];
    }
}