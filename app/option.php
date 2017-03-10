<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{

    public $timestamps = false;

    public function users(){

        return $this->belongsToMany('App\users', 'option_user','option_id', 'user_id');

    }

    public function poll(){

        return $this->belongTo('App\poll');
    }

}
