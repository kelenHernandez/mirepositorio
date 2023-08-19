<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=> $this->faker->name(),
            'correo_electronico'=> $this->faker->email(),
            'numero_telefonico'=> $this->faker->phoneNumber(),
            'direccion_Usuario'=> $this->faker-> address(),
        ];
    }
}
