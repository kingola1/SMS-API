<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = [
            'Creche','Nursery','Primary','Secondary','Others'
        ];
        return [
            'name' => $this->faker->randomElement($types)
        ];
    }
}
