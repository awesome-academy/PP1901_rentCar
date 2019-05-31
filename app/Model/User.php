<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function role()
    {
        return $this->belongsTo('app\Model\Role');
    }
    public function rentings()
    {
        return $this->hasMany('app\Model\Renting','user_id');
    }
}
