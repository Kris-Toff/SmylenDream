<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'name',
        'body',
        'post_id',
        'status',
        'id'
    ];

    protected $dates = ['created_at'];  
}
