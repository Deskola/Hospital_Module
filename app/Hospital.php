<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    public function personalinfo()
    {
    	return $this->hasMany(personalinfo::class);
    }
}
