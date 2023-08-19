<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;

class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->sentence(),
            'autor'=> $this->faker -> name(),
            'editorial' => $this->faker->company(),
            'anio_publicacion'=> $this->faker->numberBetween(1900, 2022),
            'cantidad_disponible' => $this->faker-> numberBetween(0, 10),
        ];
    }
}
