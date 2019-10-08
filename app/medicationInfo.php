<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\personalInfo;

class medicationInfo extends Model
{
    //
     public function personalInfo()
    {
    	$this->belongsTo(personalInfo::class);
    }
}
