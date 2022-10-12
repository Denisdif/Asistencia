<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaDeHorarioSeeder extends Seeder
{
    public function run()
    {
        $categorias_de_horarios = [
            [
                'nombre' => 'Tiempo completo'
            ],
            [
                'nombre' => 'Tiempo parcial'
            ]
        ];

        foreach ($categorias_de_horarios as $categoria_de_horario) {
            \App\Models\CategoriasDeHorario::create($categoria_de_horario);
        }
    }
}
