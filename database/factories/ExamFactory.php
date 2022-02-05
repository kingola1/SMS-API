<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $years = [2021, 2022, 2023,2024];
        $year = $this->faker->randomElement($years);
        $terms = [Exam::FIRST_TERM, Exam::SECOND_TERM, Exam::THIRD_TERM];
        $term = $this->faker->randomElement($terms);
        $name = $term.' Term '.$year.'/'.($year+1).' Session Examination' ;
        return [
            'name' => $name,
            'term' => $term,
            'session_id' => Session::whereIn('start',$years)->get()->pluck('id')->random(1)[0],
            'published' => false,
        ];
    }
}
