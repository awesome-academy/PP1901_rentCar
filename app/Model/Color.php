<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function vehicles()
    {
        return $this->hasMany('app\Model\Vehicle','color_id');
    }
}
