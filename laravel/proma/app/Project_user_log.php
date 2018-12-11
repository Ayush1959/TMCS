<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_user_log extends Model
{
    //TABLE NAme
    protected $table = 'project_user_log';

    protected $fillable = ['user_id', 'comments', 'user_name', 'comment_by'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
