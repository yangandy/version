<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //
    public function file(){

        return $this->hasMany('App\Dll');
    }
}
