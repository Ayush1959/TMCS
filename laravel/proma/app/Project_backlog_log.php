<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_backlog_log extends Model
{
    //TABLE NAme
    protected $table = 'project_backlog_log';

    // protected $fillable = ['project_id', 'user_id'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}
