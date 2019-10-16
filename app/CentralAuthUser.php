<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CentralAuthHospital;

class CentralAuthUser extends Model
{
	protected $connection = 'mysql2';
    public function centralAuthHospital()
    {
    	return $this->hasMany(CentralAuthHospital::class);
    }
}
