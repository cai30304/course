<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhiteList extends Model
{
    protected $table = "white_lists";

    protected $fillable = [
        'name', 'student_id', 'grade'
    ];
}
