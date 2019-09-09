<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalInfo extends Model
{
    //
    public function familyInfo()
    {
    	return $this->hasOne('App\familyInfo');
    }

    public function medicalInfo()
    {
    	return $this->hasMany('App\medicalInfo');
    }

    public function treatmentInfo()
    {
    	return $this->hasMany('App\treatmentInfo');
    }

    public function medicationInfo()
    {
    	return $this->hasMany('App\medicationInfo');
    }
}
