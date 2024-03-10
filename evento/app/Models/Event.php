<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'location', 'category_id', 'available_spots', 'image','bookings_type', 'status', 'user_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function category()
{
    return $this->belongsTo('App\Models\Category', 'category_id');
}


public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}



}