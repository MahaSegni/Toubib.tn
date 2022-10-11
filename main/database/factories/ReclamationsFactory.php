<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reclamations>
 */
class ReclamationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'objet' => $this->faker->string(20),
            'message' => $this->faker->text(200),
            'datecreation' => $this->faker->dateTime()->default(new DateTime()),
            'statut' => $this->faker->boolean(0),
        ];
    }
}
