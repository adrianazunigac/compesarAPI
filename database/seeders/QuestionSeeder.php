<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Modelo
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Si/No
        Question::create([
			'form_id' => 1,
			'description' => 'Pregunta tipo 1 (Si/No)',
			'question_type_id' => '1'
		]);

        //Texto
        Question::create([
			'form_id' => 1,
			'description' => 'Pregunta tipo 2 (Texto)',
			'question_type_id' => '2'
		]);

        //Fecha
        Question::create([
			'form_id' => 1,
			'description' => 'Pregunta tipo 3 (Fecha)',
			'question_type_id' => '3'
		]);

        //Verdadero/falso
        Question::create([
			'form_id' => 1,
			'description' => 'Pregunta tipo 4 (Numerico)',
			'question_type_id' => '4'
		]);

        //Mutiple respuesta
        Question::create([
			'form_id' => 1,
			'description' => 'Pregunta tipo 5 (Mutiple respuesta)',
			'question_type_id' => '5'
		]);
    }
}
