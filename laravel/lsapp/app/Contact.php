<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //TABLE NAme
    protected $table = 'contacts';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
