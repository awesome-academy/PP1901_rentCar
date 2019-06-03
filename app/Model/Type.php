<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function vehicles(){
        return $this->hasMany('app\Model\vehicle', 'type_id');
    }
}
