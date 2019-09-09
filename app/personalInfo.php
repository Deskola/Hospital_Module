<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalInfo extends Model
{
    //
    public function family()
    {
    	return $this->hasOne('App\familyInfo');
    }

    public function medical()
    {
    	return $this->hasMany('App\medicalInfo');
    }

    public function treatment()
    {
    	return $this->hasMany('App\treatmentInfo');
    }

    public function medication()
    {
    	return $this->hasMany('App\medicationInfo');
    }
}
