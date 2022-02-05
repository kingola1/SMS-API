<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subjects = [
            'Mathematics', 
            'English Studies',
            'French'
        ];

        $subject = $this->faker->randomElement($subjects);

        return [
            'name' => $subject,
            'short_name' => substr($subject, 0,3),
        ];
    }
}
