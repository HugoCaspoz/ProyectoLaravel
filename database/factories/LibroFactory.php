<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->unique()->text(50),
            'genero' => $this->faker->randomElement(['Ficción', 'Misterio', 'Romance', 'Fantasía', 'Histórico']),
            'autor' => $this->faker->text(50),
            'descripcion' => $this->faker->paragraph(1),
            'precio' => $this->faker->randomFloat(2, 5, 50),
            'envio' => $this->faker->randomElement(['S', 'N']),
            'stock' => $this->faker->numberBetween(0, 10000),
        ];
    }
}
