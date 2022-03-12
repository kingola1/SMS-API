<?php

namespace Database\Factories;

use App\Models\ClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classes = [
            'Nursery 1', 'Primary 1', 'JSS 1', 'SS 1',
        ];
        return [
            'name' => $this->faker->randomElement($classes),
            'class_type_id' => ClassType::all()->pluck('id')->random(1)[0], //pick a random class type
        ];
    }
}
