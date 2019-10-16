<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CentralAuthUser;

class CentralAuthHospital extends Model
{
	protected $connection = 'mysql2';
    public function centralAuthHospital()
    {
    	return $this->belongsTo(CentralAuthUser::class);
    }
}
