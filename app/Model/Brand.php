<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function vehicles()
    {
        return $this->hasMany('App\Model\Vehicle', 'brand_id');
    }
}
