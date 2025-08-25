<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => Role::ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'role' => Role::EDITOR,
        ]);

        User::factory()->create([
            'name' => 'Viewer User',
            'email' => 'viewer@example.com',
            'role' => Role::VIEWER,
        ]);

        User::factory()->create([
            'name' => 'Simple User',
            'email' => 'simple@example.com',
            'role' => null
        ]);

        User::factory(10)->create();

        ActivityType::factory(5)->create();

        Participant::factory(10)->create();

        Activity::factory(50)->create();

        $users = User::all();
        $activities = Activity::all();

        foreach ($activities as $activity) {
            $activity->likedByUsers()->attach(
                $users->random(rand(1, $users->count()))->pluck('id')->toArray()
            );
        }
    }
}
