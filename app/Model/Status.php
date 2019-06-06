<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function vehicles(){
        return $this->hasMany('App\Model\vehicle', 'status_id');
    }
}
