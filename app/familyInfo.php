<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familyInfo extends Model
{
    //
    public function person()
    {
    	$this->belongsTo('App\personalInfo');
    }
}
