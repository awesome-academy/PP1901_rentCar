<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function brand()
    {
        return $this->belongsTo('app\Model\Brand');
    }

    public function color()
    {
        return $this->belongsTo('app\Model\Color');
    }

    public function comments()
    {
        return $this->hasMany('app\Model\Comment', 'vehicle_id');
    }

    public function images()
    {
        return $this->hasMany('app\Model\Image', 'vehicle_id');
    }

    public function ratings()
    {
        return $this->hasMany('app\Model\Rating', 'vehicle_id');
    }

    public function status(){
        return $this->belongsTo('app\Model\Status');
    }

    public function type(){
        return $this->belongsTo('app\Model\Type');
    }

    public function rentings(){
        return $this->hasMany('app\Model\Renting', 'vehicle_id');
    }
}
