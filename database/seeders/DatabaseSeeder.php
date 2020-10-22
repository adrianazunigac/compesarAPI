<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            QuestionTypesSeeder::class,
            FormSeeder::class,
            QuestionSeeder::class,
            QuestionOptionSeeder::class
        ]);
    }
}
