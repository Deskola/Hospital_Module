<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\personalinfo;
//use App\HospitalVisited;
class Hospital extends Model
{
    //
    public function personalinfo()
    {
    	return $this->hasMany(personalinfo::class);
    }

    // public function hospitalVisited()
    // {
    // 	return $this->hasMany(HospitalVisited::class);
    // }
}
