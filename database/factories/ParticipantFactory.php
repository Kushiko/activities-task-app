<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'website_url' => $this->faker->url(),
            'logo_path' => 'https://placehold.co/640x480/cccccc/000000.png?text=Part+' . rand(1,100),
            'location' => [
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
            ],
        ];
    }
}
