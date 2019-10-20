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
use App\HospitalVisited;
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

        $hospitalsArray = array(
            '1234567'=>array(
                'name'=>'Kenyatta Hospital',
                'location'=>'Nairobi',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            '2345678'=>array(
                'name'=>'Jaramogi Oginga Odinga',
                'location'=>'Kisumu',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            '3456789'=>array(
                'name'=>'Nairobi Hospital',
                'location'=>'Nairobi',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            '4567891'=>array(
                'name'=>'AgaKhan Hospital',
                'location'=>'Kisumu',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            '5678912'=>array(
                'name'=>'Getrude Children Hospital',
                'location'=>'Nairobi',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            '6789123'=>array(
                'name'=>'Avenue Hospital',
                'location'=>'Mobasa',
                'logo'=>'https://firebasestorage.googleapis.com/v0/b/medical-history-bd709.appspot.com/o/hospital_logo%2FKNH.jpg?alt=media&token=7a7e187e-253d-47a2-96be-bf8b4564f706'),
            
        );

        //get the requests
        $surname = $request->input('surname');
        $first_name = $request->input('first_name');
        $other_name = $request->input('other_name');
        $Date_of_Birth = $request->input('Date_of_Birth');
        $national_id = $request->input('national_id');
        $residential_area = $request->input('residential_area');
        $email_address_or_phone = $request->input('email_address_or_phone');
        $family_member = $request->input('family_member');
        $hereditary_diseases = $request->input('hereditary_diseases');
        $mental_health_condition = $request->input('mental_health_condition');
        $pregnancy_complications = $request->input('pregnancy_complications');
        $cause_of_death = $request->input('cause_of_death');
        $weight = $request->input('weight');
        $height = $request->input('height');
        $blood_pressure = $request->input('blood_pressure');
        $temperature = $request->input('temperature');
        $medical_info = $request->input('medical_info');
        $hospitalName = $request->input('hospitalName');

        //model objects
        $hosp = new Hospital;
        $pInfo = new personalInfo;
        $fInfo = new familyInfo;
        $mInfo = new medicalInfo;
        $caUser = new CentralAuthUser;
        $caHosp = new CentralAuthHospital;  
        $visHosp = new HospitalVisited;

        // Password Generation
        $gen_pass = str_random(8);
        $pass = $gen_pass;

        //Hospital Insert Logic        
        //check if the hospital has been registed or not
        //Hospital doesn't exist
        if (!Hospital::where('hospital_id', $hospitalName)->exists())
        {
                    
            $hosp->hospital_id = $request->input('hospitalName');
            $hosp->name = $hospitalsArray[$hospitalName]['name'];
            $hosp->location = $hospitalsArray[$hospitalName]['location'];
            $hosp->save();



            //Check if user has vistied the hospital before
            if (!HospitalVisited::where(['patient_id'=>$national_id ,'hospital_id'=>$hospitalName])->exists()) 
            {

                //save hospial_id of hopitals visited
                $visHosp->patient_id = $national_id;
                $visHosp->hospital_id = $hospitalName;
                $visHosp->save();

                if (!HospitalVisited::where(['patient_id'=>$id,'hospital_id'=>$hospId])->exists())
                {

                //save hospial_id of hopitals visited
                    $visHosp->patient_id = $id;
                    $visHosp->hospital_id = $hospId;
                    $visHosp->save();

                    $pInfo->national_id = $id;
                    $pInfo->hospital_id = $hosp->hospital_id;
                    $pInfo->sur_name = $request->input('surname');
                    $pInfo->first_name = $request->input('first_name');
                    $pInfo->last_name = $request->input('other_name');
                    $pInfo->data_of_birth = $request->input('Date_of_Birth');
                    $pInfo->email = $request->input('email_address_or_phone');
                    $pInfo->password = Hash::make($pass);
                    $pInfo->residential_area = $request->input('residential_area');

                                  
                    $fInfo->national_id = $pInfo->national_id;
                    $fInfo->family_member =  $request->input('family_member');
                    $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                    $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                    $fInfo->mental_condition = $request->input('mental_health_condition');
                    $fInfo->DR_course_o_death = $request->input('cause_of_death');
                    
                    
                    $mInfo->national_id = $pInfo->national_id;
                    $mInfo->weight = $request->input('weight');
                    $mInfo->height = $request->input('height');
                    $mInfo->blood_pressure = $request->input('blood_pressure');
                    $mInfo->temperature = $request->input('temperature');
                    $mInfo->Reason_for_visit = $request->input('medical_info');
                    
                    if ($pInfo->save()) 
                    {

                            $data = array(
                            'email' => $pInfo->email,
                            'username' => $pInfo->national_id,
                            'password' =>  $pass,
                            'name' =>$hospitalsArray[$hospId]['name']
                        );
                    }

                    //Mail::to($data['email'])->send(new SendMail($data));

                    if (!CentralAuthHospital::where(['hospital_id'=>$hospId])->get())
                    {
                        $caHosp->hospital_id = $pInfo->hospital_id;                        
                        $caHosp->hospital_name =$hospitalsArray[$hospId]['name'];
                        $caHosp->logo = $hospitalsArray[$hospId]['logo']; 

                        $caUser->national_id = $pInfo->national_id;
                        $caUser->hospital_id = $pInfo->hospital_id; 
                        $caUser->password = $pInfo->password;  
                        if($caHosp->save())
                        {
                            $caUser->save();
                        }
                        
                    }else{
                        //Hospital does not exit
                        $caUser->national_id = $pInfo->national_id;
                        $caUser->hospital_id = $pInfo->hospital_id; 
                        $caUser->password = $pInfo->password;
                        $caUser->save(); 
                    }

                    $fInfo->save();
                    $mInfo->save(); 
                }
            }
            else
            {
                //This person has visited this hospital before
                $id = Input::get('national_id');
                $residential_area = $request->input('residential_area');
                $pInfo = personalInfo::find($id);
                $pInfo->residential_area = $residential_area;
                


                $fInfo->national_id = $request->input('national_id');
                $fInfo->family_member =  $request->input('family_member');
                $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                $fInfo->mental_condition = $request->input('mental_health_condition');
                $fInfo->DR_course_o_death = $request->input('cause_of_death');
                
                
                $mInfo->national_id = $request->input('national_id');
                $mInfo->weight = $request->input('weight');
                $mInfo->height = $request->input('height');
                $mInfo->blood_pressure = $request->input('blood_pressure');
                $mInfo->temperature = $request->input('temperature');
                $mInfo->Reason_for_visit = $request->input('medical_info');
                if ($pInfo->save()) 
                {                     
                    $fInfo->save();
                    $mInfo->save();
                } 
            }
        }
        else
        {
            //Check if user has vistied the hospital before
            if (!HospitalVisited::where(['patient_id'=>$national_id,'hospital_id'=>$hospitalName])->exists()) 
            {
                //save hospial_id of hopitals visited
                $visHosp->patient_id = $id;
                $visHosp->hospital_id = $hospId;
                $visHosp->save();

                $pInfo->national_id = $id;
                $pInfo->hospital_id = $request->input('hospitalName');
                $pInfo->sur_name = $request->input('surname');
                $pInfo->first_name = $request->input('first_name');
                $pInfo->last_name = $request->input('other_name');
                $pInfo->data_of_birth = $request->input('Date_of_Birth');
                $pInfo->email = $request->input('email_address_or_phone');
                $pInfo->password = Hash::make($pass);
                $pInfo->residential_area = $request->input('residential_area');

                              
                $fInfo->national_id = $pInfo->national_id;
                $fInfo->family_member =  $request->input('family_member');
                $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                $fInfo->mental_condition = $request->input('mental_health_condition');
                $fInfo->DR_course_o_death = $request->input('cause_of_death');
                
                
                $mInfo->national_id = $pInfo->national_id;
                $mInfo->weight = $request->input('weight');
                $mInfo->height = $request->input('height');
                $mInfo->blood_pressure = $request->input('blood_pressure');
                $mInfo->temperature = $request->input('temperature');
                $mInfo->Reason_for_visit = $request->input('medical_info');

                if ($pInfo->save()) 
                {

                        $data = array(
                        'email' => $pInfo->email,
                        'username' => $pInfo->national_id,
                        'password' =>  $pass,
                        'name' =>$hospitalsArray[$hospId]['name']
                    );
                }

                 //Mail::to($data['email'])->send(new SendMail($data));

                if (!CentralAuthHospital::where(['hospital_id'=>$hospId])->get()) 
                {
                    $caHosp->hospital_id = $pInfo->hospital_id;                        
                    $caHosp->hospital_name =$hospitalsArray[$hospId]['name'];
                    $caHosp->logo = $hospitalsArray[$hospId]['logo']; 

                    $caUser->national_id = $pInfo->national_id;
                    $caUser->hospital_id = $pInfo->hospital_id; 
                    $caUser->password = $pInfo->password;  
                    if($caHosp->save())
                    {
                        $caUser->save();
                    }                        
                }
                else
                {
                    //Hospital does not exit
                    $caUser->national_id = $pInfo->national_id;
                    $caUser->hospital_id = $pInfo->hospital_id; 
                    $caUser->password = $pInfo->password;
                    $caUser->save(); 
                }
                //return "user created";
            }
            else
            {
                //This person has visited this hospital before
                //update the residential area
                $pInfo = personalInfo::where('national_id',$national_id)->update(['residential_area'=>$residential_area]);

                //$pInfo->residential_area = $residential_area;
                $fInfo->national_id = $request->input('national_id');
                $fInfo->family_member =  $request->input('family_member');
                $fInfo->hereditary_disease = $request->input('hereditary_diseases');
                $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
                $fInfo->mental_condition = $request->input('mental_health_condition');
                $fInfo->DR_course_o_death = $request->input('cause_of_death');
                
                $mInfo->national_id = $request->input('national_id');
                $mInfo->weight = $request->input('weight');
                $mInfo->height = $request->input('height');
                $mInfo->blood_pressure = $request->input('blood_pressure');
                $mInfo->temperature = $request->input('temperature');
                $mInfo->Reason_for_visit = $request->input('medical_info');
                if ($pInfo) 
                {                     
                    $fInfo->save();
                    $mInfo->save();
                } 
            }
            
        }        
        //return "Am fucked!";
       //return view('admin.pages.Info.create');
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
