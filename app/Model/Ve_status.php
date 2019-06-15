<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ve_status extends Model
{
    public function vehicles(){
        return $this->hasMany('App\Model\Vehicle', 've_status_id');
    }
}
