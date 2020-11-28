<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function creator(){
        return $this->belongsTo('App\User','created_by','id');
    }

    public function comments(){
        return $this->hasMany('App\comment');
    }
}
