<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Modelo
use App\models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'dni' => '123456',
            'name' => 'administrador',
            'email' => 'amendozaaguiar@outlook.com',
            'password' => bcrypt('123456')
        ]);
    }
}
