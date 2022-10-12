<?php

namespace Database\Factories;

use App\Models\TiposDeIncidencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TiposDeIncidenciaFactory extends Factory
{
    protected $model = TiposDeIncidencia::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
