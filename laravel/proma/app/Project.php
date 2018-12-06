<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //TABLE NAme
    protected $table = 'project';

    protected $fillable = ['monitoring'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
