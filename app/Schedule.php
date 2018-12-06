<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'time_start', 'time_end', 'day'
  ];


  public $timestamps = false;

}
