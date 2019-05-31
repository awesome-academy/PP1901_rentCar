<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function vehicle()
    {
        return $this->belongsTo('app\Model\Vehicle');
    }
}
