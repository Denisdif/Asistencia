<?php

namespace Database\Factories;

use App\Models\HorasExtra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorasExtraFactory extends Factory
{
    protected $model = HorasExtra::class;

    public function definition()
    {
        return [
			'fecha_hora_inicio' => $this->faker->name,
			'fecha_hora_fin' => $this->faker->name,
			'remuneracion' => $this->faker->name,
			'empleado_id' => $this->faker->name,
        ];
    }
}
