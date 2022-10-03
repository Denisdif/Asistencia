<?php

namespace Database\Factories;

use App\Models\CategoriasDeHorario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriasDeHorarioFactory extends Factory
{
    protected $model = CategoriasDeHorario::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
