<?php

namespace App\Http\Controllers;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\personalInfo;
use App\familyInfo;
use App\medicalInfo;
use App\Hospital;
use App\CentralAuthUser;
use App\CentralAuthHospital;
class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = personalInfo::all();
        $families = familyInfo::all();
        $medicals = medicalInfo::all();
        return view('admin.pages.Info.view', compact($families, $medicals))->with('patients', $patients);
        //return view('admin.pages.Info.view');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.Info.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            
            'surname'=>'required',
            'first_name'=>'required',
            'other_name'=>'required',
            'Date_of_Birth'=>'required',
            'national_id'=>'required',
            'residential_area'=>'required',
            'email_address_or_phone'=>'required|email',
            'family_member'=>'required',
            'hereditary_diseases'=>'required',
            'mental_health_condition'=>'required',
            'pregnancy_complications'=>'required',            
            'cause_of_death'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'blood_pressure'=>'required',
            'temperature'=>'required',
            'medical_info'=>'required',
            'hospitalName'=>'required'
        ]);

        $gen_pass = str_random(8);
        $hashed_random_password = Hash::make($gen_pass);
        $hospital_code = $request->input('hospitalName');

        $hosp = new Hospital;        
        $hosp->hospital_id = $request->input('hospitalName');
        $hosp->name = 'Kenyatta Hospital';
        if (Hospital::where('hospital_id',$hospital_code)->exists()) {

            $pInfo = new personalInfo;
            $user_id = $request->input('national_id');
            if (personalInfo::where('hospital_id',$user_id)->exists()) {

                $fInfo = new familyInfo;
                //$fInfo->personal_id = $request->input('national_id');
                $fInfo->personal_id = $pInfo->national_id;
                $fInfo->family_member =  $request->input('family_member');
                $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                $fInfo->mental_condition = $request->input('mental_health_condition');
                $fInfo->DR_course_o_death = $request->input('cause_of_death');
                
                $mInfo = new medicalInfo;
                $mInfo->personal_id = $pInfo->national_id;
                $mInfo->weight = $request->input('weight');
                $mInfo->height = $request->input('height');
                $mInfo->blood_pressure = $request->input('blood_pressure');
                $mInfo->temperature = $request->input('temperature');
                $mInfo->Reason_for_visit = $request->input('medical_info');

                $fInfo->save();
                $mInfo->save();

            }else{

                $pInfo->national_id = $request->input('national_id');
                $pInfo->hospital_id = $hosp->hospital_id;
                $pInfo->sur_name = $request->input('surname');
                $pInfo->first_name = $request->input('first_name');
                $pInfo->last_name = $request->input('other_name');
                $pInfo->data_of_birth = $request->input('Date_of_Birth');
                $pInfo->email = $request->input('email_address_or_phone');
                $pInfo->password = $hashed_random_password;
                $pInfo->residential_area = $request->input('residential_area');

                if($pInfo->save()){
                        $data = array(
                        'email' => $pInfo->email,
                        'username' => $pInfo->national_id,
                        'password' =>  $gen_pass
                    );      
                        
                    Mail::to($data['email'])->send(new SendMail($data));

                    $caUser = new CentralAuthUser;
                    $caUser->national_id = $pInfo->national_id;
                    $caUser->password = $pInfo->password;
                    $caUser->save();

                    $caHosp = new CentralAuthHospital;
                    $caHosp->hospital_id = $pInfo->hospital_id;
                    $caHosp->national_id = $pInfo->national_id;
                    $caHosp->logo = 'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706';
                    $caHosp->save();

                }
            } 

        }else{
            $hosp->save();

            $pInfo = new personalInfo;
            $user_id = $request->input('national_id');
            if (personalInfo::where('hospital_id',$user_id)->exists()) {

                $fInfo = new familyInfo;
                //$fInfo->personal_id = $request->input('national_id');
                $fInfo->personal_id = $pInfo->national_id;
                $fInfo->family_member =  $request->input('family_member');
                $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                $fInfo->mental_condition = $request->input('mental_health_condition');
                $fInfo->DR_course_o_death = $request->input('cause_of_death');
                
                $mInfo = new medicalInfo;
                $mInfo->personal_id = $pInfo->national_id;
                $mInfo->weight = $request->input('weight');
                $mInfo->height = $request->input('height');
                $mInfo->blood_pressure = $request->input('blood_pressure');
                $mInfo->temperature = $request->input('temperature');
                $mInfo->Reason_for_visit = $request->input('medical_info');

                $fInfo->save();
                $mInfo->save();

            }else{

                $pInfo->national_id = $request->input('national_id');
                $pInfo->hospital_id = $hosp->hospital_id;
                $pInfo->sur_name = $request->input('surname');
                $pInfo->first_name = $request->input('first_name');
                $pInfo->last_name = $request->input('other_name');
                $pInfo->data_of_birth = $request->input('Date_of_Birth');
                $pInfo->email = $request->input('email_address_or_phone');
                $pInfo->password = $hashed_random_password;
                $pInfo->residential_area = $request->input('residential_area');

                if($pInfo->save()){
                        $data = array(
                        'email' => $pInfo->email,
                        'username' => $pInfo->national_id,
                        'password' =>  $gen_pass
                    );      
                        
                    Mail::to($data['email'])->send(new SendMail($data));

                    $caUser = new CentralAuthUser;
                    $caUser->national_id = $pInfo->national_id;
                    $caUser->password = $pInfo->password;
                    $caUser->save();

                    $caHosp = new CentralAuthHospital;
                    $caHosp->hospital_id = $pInfo->hospital_id;
                    $caHosp->national_id = $pInfo->national_id;
                    $caHosp->logo = 'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706';
                    $caHosp->save();

                }
            }
        }
        return view('admin.pages.Info.create')->with('messages','messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // }catch(Illuminate\Database\QueryException $e){
        //             $errorCode = $e->errorInfo[1];
        //             if($errorCode == '1062'){
        //                 dd('Duplicate Entry');
        //             }
        //         }
    }
}
