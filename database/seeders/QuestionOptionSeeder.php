<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Modelo
use App\Models\QuestionOption;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        QuestionOption::create([
        	'question_id'=>5,
        	'description' => 'Opcion 1 pregunta 5'
        ]);

        QuestionOption::create([
        	'question_id'=>5,
        	'description' => 'Opcion 2 pregunta 5'
        ]);
        
        QuestionOption::create([
        	'question_id'=>5,
        	'description' => 'Opcion 3 pregunta 5'
        ]);
    }
}
