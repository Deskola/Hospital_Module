<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\personalInfo;

class treatmentInfo extends Model
{
    //
    public function person()
    {
    	$this->belongsTo(personalInfo::class);
    }
}
