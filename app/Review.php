<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'room_id', 'customer_id', 'booking_id', 'rating', 'review'
    ];

    protected $hidden = [];
}