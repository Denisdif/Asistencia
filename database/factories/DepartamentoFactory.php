<?php

namespace Database\Factories;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartamentoFactory extends Factory
{
    protected $model = Departamento::class;

    public function definition()
    {
        return [
			'nombre_departamento' => $this->faker->name,
			'area_id' => $this->faker->name,
        ];
    }
}
