<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicationInfo extends Model
{
    //
     public function personalInfo()
    {
    	$this->belongsTo('App\personalInfo');
    }
}
