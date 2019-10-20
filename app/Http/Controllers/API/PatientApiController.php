<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\CentralAuthUser;
use App\CentralAuthHospital;
use App\HospitalVisited;
use App\Hospital;


class PatientApiController extends Controller
{
    public function userLogin(Request $request){        

        $password =  $request->password;
        $username = $request->national_id;
        $users = CentralAuthUser::where('national_id', $username)->get();        
        if ($users) {
            foreach ($users as $user) {
                if (Hash::check($password, $user->password)) {

                    //$authHosps = HospitalVisited::where('national_id',$user->national_id)->get();
                    $hospis = HospitalVisited::where('patient_id',$user->national_id)->get();

                    if ($hospis) {
                        foreach ($hospis as $hospital) {
                            return response()->json([
                            'username' => $user->national_id,
                            'password' => $user->password,
                            'hospital_info'=> array($hospital->hospital_id)
                        ]);
                        }
                          
                    }
                   
                }else{
                    echo "Wrong password";
                }
                                
            }

        }      
        
    }

    public function medicalRecord(Request $request){

    }
    
}
