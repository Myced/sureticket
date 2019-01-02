<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCount extends Model
{
    public function bookings()
    {
        return Booking::where('booking_count_id', '=', $this->id)->get();
    }
}
