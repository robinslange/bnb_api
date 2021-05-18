<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'roomname', 'description', 'roomtype', 'beds'
    ];

    protected $hidden = [];
}