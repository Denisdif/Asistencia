<?php

namespace Database\Factories;

use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IncidenciaFactory extends Factory
{
    protected $model = Incidencia::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'fecha_hora' => $this->faker->name,
			'descontar' => $this->faker->name,
			'empleado_id' => $this->faker->name,
        ];
    }
}
