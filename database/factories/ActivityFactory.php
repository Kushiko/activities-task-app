<?php

namespace Database\Factories;

use App\Models\ActivityType;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'participant_id' => Participant::factory(),
            'media_files' => [
                'https://placehold.co/640x480/cccccc/000000.png?text=Activity+' . rand(1,100),
                'https://placehold.co/640x480/cccccc/000000.png?text=Activity+' . rand(1,100),
            ],
            'short_description' => $this->faker->sentence(10),
            'registration_url' => $this->faker->url(),
            'location' => [
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
                [$this->faker->latitude(), $this->faker->longitude()],
            ],
            'schedule' => [
                [
                    'date' => $this->faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
                    'time_start' => $this->faker->time('H:i'),
                    'time_end' => $this->faker->time('H:i'),
                ],
            ],
            'activity_type_id' => ActivityType::factory(),
        ];
    }
}
