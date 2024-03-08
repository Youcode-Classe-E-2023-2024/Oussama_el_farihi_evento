<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'location', 'category_id', 'available_spots', 'image','bookings_type',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
