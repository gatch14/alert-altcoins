<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Altcoin extends Model
{
    protected $fillable = ['name', 'price', 'choices', 'user_id'];
}
