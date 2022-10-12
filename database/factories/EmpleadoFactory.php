<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition()
    {
        $categoria_de_horario_id = \App\Models\CategoriasDeHorario::all()->random()->id;

        return [
			'nombre' => $this->faker->name,
			'categoria_de_horario_id' => $categoria_de_horario_id,
        ];
    }
}
