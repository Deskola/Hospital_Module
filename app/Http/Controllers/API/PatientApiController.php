<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CentralAuthUser;
use App\CentralAuthHospital;

class PatientApiController extends Controller
{
    public function userLogin()
    {       

        // $users = CentralAuthUser::all();
        // dd($users);
        $username = $request->input('username');
        $password = $request->input('password');
        //$hospital_code = $request->input('hospital_code');

        //$hospId = new Hospital::find($hospital_code);

        $data = DB::select('SELECT * FROM central_auth_users where national_id=?'[$username]);
        if (count($data) > 0) {
            # code...
            if (Hash::check($password, $data->password)) {
                # code...
                echo "Logged in successfully";
            }
            else{
                echo "Wrong password";
            }
        }else{ echo "User doesnt exist";}
    }
    
}
