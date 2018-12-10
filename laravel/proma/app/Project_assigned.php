<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_assigned extends Model
{
    //TABLE NAme
    protected $table = 'project_assigned';

    protected $fillable = ['monitoring'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
