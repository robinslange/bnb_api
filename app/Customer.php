<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'firstname', 'lastname', 'email', 'password'
    ];

    protected $hidden = [];
}
