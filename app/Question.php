<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'popularity',
        'title',
        'content'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function teamOne(){
      return $this->belongsTo('App\Team');
    }
    public function teamTwo(){
      return $this->belongsTo('App\Team');
    }
    public function arguments(){
      return $this->hasMany('App\Argument');
    }
}
