<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = config('settings.roles');
        
        return [
            'name' => $this->faker->randomElement($roles)
        ];
    }
}
