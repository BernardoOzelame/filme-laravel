<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmesSeeder extends Seeder {
    public function run(): void {
        DB::table('filmes')->insert([
            [
                'nome' => 'A Freira',
                'sinopse' => 'Um filme assustador sobre uma freira possuída',
                'ano' => 2018,
                'categoria' => 'Terror',
                'linkTrailer' => 'https://www.youtube.com/watch?v=4V44ew-laC4',
            ]
        ]);
    }
}
