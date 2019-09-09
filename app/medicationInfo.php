<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicationInfo extends Model
{
    //
     public function person()
    {
    	$this->belongsTo('App\personalInfo');
    }
}
