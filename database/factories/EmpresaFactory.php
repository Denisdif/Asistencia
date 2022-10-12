<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
			'nombre_empresa' => $this->faker->name,
			'cuit' => $this->faker->name,
			'domicilio' => $this->faker->name,
			'razon_social' => $this->faker->name,
        ];
    }
}
