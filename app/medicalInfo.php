<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicalInfo extends Model
{
    //
    public function person()
    {
    	$this->belongsTo('App\personalInfo');
    }
}
