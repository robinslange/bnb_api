<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'id', 'room_id', 'customer_id', 'checkinDate', 'checkoutDate'
    ];

    protected $hidden = [];
}