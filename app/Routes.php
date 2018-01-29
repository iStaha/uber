<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    



     /*public function busses() {
        return $this->hasMany('Busses');
    }
*/


    public function busses() {
        return $this->belongsToMany('App\Busses', 'busses_routes', 'routes_id','busses_id');
    }
}
