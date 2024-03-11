<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'reservation_id' => Booking::factory(),
            'ticket_number' => $this->faker->unique()->numerify('TICKET#####')
        ];
    }
}
