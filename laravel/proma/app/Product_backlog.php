<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_backlog extends Model
{
    //TABLE NAme
    protected $table = 'product_backlog';

    // protected $fillable = ['project_id', 'user_id'];
    //Primary key

    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}
