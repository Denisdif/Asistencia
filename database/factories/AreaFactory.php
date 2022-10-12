<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreaFactory extends Factory
{
    protected $model = Area::class;

    public function definition()
    {
        return [
			'nombre_area' => $this->faker->name,
			'empresa_id' => $this->faker->name,
        ];
    }
}
