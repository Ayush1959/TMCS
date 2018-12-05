<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'age', 'address', 'gender', 'number'];
}
