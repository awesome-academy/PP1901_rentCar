<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        $this->hasMany('App\Model\User', 'role_id');
    }
}
