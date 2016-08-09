<?php

use Illuminate\Database\Seeder;

class TableCurso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            ['codigo' => 'isw','descripcion' => 'Ingenieria Software']
            ]);
        DB::table('cursos')->insert([
            ['codigo' => 'En','descripcion' => 'Ingles']
            ]);
    }
}
