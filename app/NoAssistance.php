<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoAssistance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assistance', 'date_registered', 'schedule_id', 'subject_id', 'profesor_id', 'administrator_id'
    ];
}
