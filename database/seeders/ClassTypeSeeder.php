<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Creche','Nursery','Primary','Secondary','Others'
        ];

        DB::table('class_types')->delete();

        foreach($types as $type){
            ClassType::factory()->create(['name' => $type]);
        }
    }
}
