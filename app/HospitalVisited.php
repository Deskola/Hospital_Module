<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\personalInfo;
use App\Hospital;

class HospitalVisited extends Model
{
    public function patients()
    {
    	return $this->belonsTo(personalInfo::class);
    }

     public function hospital()
    {
    	return $this->belonsTo(Hospital::class);
    }
}
