<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'user_id' => User::factory(),
            'is_confirmed' => $this->faker->boolean
        ];
    }
}
