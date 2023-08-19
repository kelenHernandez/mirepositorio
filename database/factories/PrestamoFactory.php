<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prestamo;

class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_solicitud'=> $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'fecha_prestamo'=> $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'fecha_devolucion'=> $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'libro_id' => $this->faker->numberBetween(1, 50),
            'usuario_id' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
