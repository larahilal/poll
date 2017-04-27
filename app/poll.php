<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poll extends Model
{

    public $timestamps = false;

    public function options(){

        return $this->hasMany('App\option');

    }

    public function users(){

        return $this->belongsTo('App\users');

    }
}
