<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //From 2021 to 2040
        for($i=2019;$i<=2039;$i++){
            $year = $i;
           Session::factory()->create([
               'start' => $year,
               'end' => $year+1
           ]);
        }
    }
}
