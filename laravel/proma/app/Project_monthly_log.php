<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_monthly_log extends Model
{
    //TABLE NAme
    protected $table = 'project_monthly_log';

    protected $fillable = ['user_id', 'user_name', 'date', 'score'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
