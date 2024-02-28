<?php

namespace Database\Factories\old;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class XClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[A-Z]'),
            'nombre' => $this->faker->firstname(),
            'apellido1' => $this->faker->lastname(),
            'apellido2' => $this->faker->optional(0.8)->lastname(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', 'now'),
//            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            'foto' => $this->faker->randomElement($fotos),
            'observaciones' => $this->faker->optional(0.8)->text,
        ];
    }
}
