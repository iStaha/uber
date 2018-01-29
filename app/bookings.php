<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    //

       protected $fillable = [
        'name','from','to','depart','return',
    ];


      public function user() {
         return $this->belongsTo('User');
    }

}
