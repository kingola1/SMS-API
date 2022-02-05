<?php

    return [
        'roles' => [
            'super', 'admin', 'teacher', 'student', 'librarian', 'accountant', 'manager'
        ],

        'cass' =>['cass1','cass2','tass'], 
        /*
        * Define Maximum value for validating Assessment scores
        *
        */
        'cass1'=>['max'=>20],
        'cass2'=>['max'=>20],
        'cass3'=>['max'=>0], 
        'cass4'=>['max'=>0], 
        'cass5'=>['max'=>0], 
        'cass6'=>['max'=>0], 
        'tass' =>['max'=>60],
    
        //Define roles that are not returned to UI
        //roles are filtered using Model global scopes
    
        'roles-exception' => [
            'super','others','support','parent','librarian','accountant',
        ],
    
        /*
        |
        |   Define E-Class credentials
        |
        */
        'e-class' =>[
            'zoom-api-key' => env('ZOOM_API_KEY'),
            'zoom-api-secret' => env('ZOOM_API_SECRET'),
            'max-class-duration' => 120, //Maximum duration in minutes for a class
        ],
    
        /*
         *Define behavioural assessment abilities
         * 
         */
        'skills' => [
            ['name'=> 'Handwriting','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Verbal Fluency','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Games','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Sports','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Musical Skills','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Handling Tools','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Punctuality','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Neatness','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Politeness','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Honesty','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Teamwork','value' => 5,'max' => 5, 'min' => 1],
            ['name'=> 'Leadership','value' => 5,'max' => 5, 'min' => 1],
        ],
    
    
        //TEST
        //set number of students to be created in Database Seeder
        'seed' => [
            'students' => 1
        ]
    
    ];
    ];