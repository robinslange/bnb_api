<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'id', 'room_id', 'customer_id', 'rating', 'review'
    ];

    protected $hidden = [];
}