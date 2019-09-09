<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class treatmentInfo extends Model
{
    //
    public function person()
    {
    	$this->belongsTo('App\personalInfo');
    }
}
