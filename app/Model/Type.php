<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Type extends Model
{
    protected $table = 'types';
    public function vehicle(){
        return $this->hasMany('App\Model\Vehicle', 'type_id');
    }
}
