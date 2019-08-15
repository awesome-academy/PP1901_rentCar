<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    public function vehicles(){
        return $this->hasMany('App\Model\Vehicle', 'status_id');
    }
}
