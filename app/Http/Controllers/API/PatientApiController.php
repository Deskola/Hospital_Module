<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\personalInfo;

class PatientApiController extends Controller
{
    public function userLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $hospital_code = $request->input('hospital_code');

        //$hospId = new Hospital::find($hospital_code);

        $data = DB::select('SELECT * FROM personal_infos where national_id=? AND $password=? AND hospital_code=?',[$username, $hospital_code]);
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
