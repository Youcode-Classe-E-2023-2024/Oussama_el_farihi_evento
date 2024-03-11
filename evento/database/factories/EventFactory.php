<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'location' => $this->faker->address,
            'category_id' => \App\Models\Category::factory(),
            'available_spots' => $this->faker->numberBetween(50, 100),
            'booking_type' => $this->faker->boolean
        ];
    }
}
