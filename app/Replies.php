<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $fillable = [
        'author',
        'body',
        'comment_id'
    ];
}
