<?php

use Illuminate\Database\Seeder;

class TableProfesor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesores')->insert([
            ['nombre' => 'Misael']
            ]);
         DB::table('profesores')->insert([
            ['nombre' => 'Alejandro']
            ]);
          DB::table('profesores')->insert([
            ['nombre' => 'Diego']
            ]);
    }
}
