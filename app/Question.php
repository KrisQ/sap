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

    public function photo(){
      return $this->belongsTo('App\Photo');
    }
}
