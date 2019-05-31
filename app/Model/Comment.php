<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function vehicle()
    {
        return $this->belongsTo('app\Model\Vehicle');
    }
}
