<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','first_name','last_name', 'email', 'password', 'key',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
