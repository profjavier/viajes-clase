<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Viaje>
 */
class ViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->sentence(5);
        $slug = Str::slug($titulo);
        $salida = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $llegada = $this->faker->dateTimeBetween($salida, '+30 days');

        return [
            'referencia' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'titulo' => $titulo,
            'slug' => $slug,
            'precio' => $this->faker->optional()->randomFloat(2, 0, 3500),
            'numero_participantes' => $this->faker->optional()->randomNumber(1, 500),
            'salida' => $salida,
            'llegada' => $llegada,
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'descripcion' => $this->faker->optional(0.8)->text,
        ];
    }
}
