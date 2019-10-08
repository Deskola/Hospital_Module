<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\familyInfo;
use App\Hospital;
use App\medicalInfo;
use App\treatmentInfo;
use App\medicationInfo;

class personalInfo extends Model
{
    //
    public function hospitals(){
        return $this->belongsTo(Hospital::class);
    }
    public function familyInfo()
    {
    	return $this->hasOne(familyInfo::class);
    }

    public function medicalInfo()
    {
    	return $this->hasMany(medicalInfo::class);
    }

    public function treatmentInfo()
    {
    	return $this->hasMany(treatmentInfo::class);
    }

    public function medicationInfo()
    {
    	return $this->hasMany(medicationInfo::class);
    }
}
