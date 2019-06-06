<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function vehicles()
    {
        return $this->hasMany('App\Model\Vehicle', 'color_id');
    }
}
