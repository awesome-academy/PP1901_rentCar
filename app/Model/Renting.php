<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Renting extends Model
{
    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function vehicle(){
        return $this->belongsTo('App\Model\Vehicle');
    }
}
