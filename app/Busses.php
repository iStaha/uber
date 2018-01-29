<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busses extends Model
{
    //


     public function routes() {
        return $this->belongsToMany('App\Routes', 'busses_routes', 'busses_id', 'routes_id');
    }
}
