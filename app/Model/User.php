<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }

    public function rentings()
    {
        return $this->hasMany('App\Model\Renting', 'user_id');
    }
}
