<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Altcoin extends Model
{
    protected $fillable = ['name', 'price', 'choices', 'choices_value', 'user_id'];
}
