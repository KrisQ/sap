<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function team(){
    return $this->belongsTo('App\Team');
  }
  public function post(){
    return $this->belongsTo('App\Post');
  }
}
