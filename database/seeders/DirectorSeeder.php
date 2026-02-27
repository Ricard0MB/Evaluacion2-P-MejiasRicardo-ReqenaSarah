<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    public function run(): void
    {
        Director::create([
            'nombre' => 'Christopher Nolan',
            'nacionalidad' => 'Británico'
        ]);

        Director::create([
            'nombre' => 'Quentin Tarantino',
            'nacionalidad' => 'Estadounidense'
        ]);

        Director::create([
            'nombre' => 'Guillermo del Toro',
            'nacionalidad' => 'Mexicano'
        ]);
    }
}