<?php

namespace Database\Factories;

use App\Models\Jornada;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JornadaFactory extends Factory
{
    protected $model = Jornada::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'hora_entrada' => $this->faker->name,
			'hora_salida' => $this->faker->name,
			'dia' => $this->faker->name,
			'categoria_de_horario_id' => $this->faker->name,
        ];
    }
}
