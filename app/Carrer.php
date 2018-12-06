<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'key', 'alias'
    ];

    public $timestamps = false;

}
