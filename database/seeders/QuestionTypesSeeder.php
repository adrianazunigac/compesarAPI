<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Modelo
use App\Models\QuestionTypes;

class QuestionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionTypes::create(['description' => 'Si/No']);
        QuestionTypes::create(['description' => 'Texto']);
        QuestionTypes::create(['description' => 'Fecha']);
        QuestionTypes::create(['description' => 'Verdadero/falso']);
        QuestionTypes::create(['description' => 'Mutiple respuesta Opcion unica']);
    }
}
