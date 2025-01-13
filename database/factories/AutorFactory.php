<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    protected $model = Autor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'estado' => $this->faker->boolean(80), // 80% de chance de estar ativo
        ];
    }
}
