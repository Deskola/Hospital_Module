<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\personalInfo;
use App\familyInfo;
use App\medicalInfo;

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
            'email_address_or_phone'=>'required',
            'family_member'=>'required',
            'hereditary_diseases'=>'required',
            'mental_health_condition'=>'required',
            'pregnancy_complications'=>'required',            
            'cause_of_death'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'blood_pressure'=>'required',
            'temperature'=>'required',
            'medical_info'=>'required'
        ]);

        $pInfo = new personalInfo;
        $pInfo->national_id = $request->input('national_id');
        $pInfo->sur_name = $request->input('surname');
        $pInfo->first_name = $request->input('first_name');
        $pInfo->last_name = $request->input('other_name');
        $pInfo->data_of_birth = $request->input('Date_of_Birth');
        $pInfo->email = $request->input('email_address_or_phone');
        $pInfo->residential_area = $request->input('residential_area');

        $fInfo = new familyInfo;
        $fInfo->personal_id = $request->input('national_id');
        $fInfo->family_member = $request->input('family_member');
        $fInfo->hereditary_disease = $request->input('hereditary_diseases');
        $fInfo->pregnancy_complications = $request->input('pregnancy_complications');
        $fInfo->mental_condition = $request->input('mental_health_condition');
        $fInfo->DR_course_o_death = $request->input('cause_of_death');
        
        $mInfo = new medicalInfo;
        $mInfo->personal_id = $request->input('national_id');
        $mInfo->weight = $request->input('weight');
        $mInfo->height = $request->input('height');
        $mInfo->blood_pressure = $request->input('blood_pressure');
        $mInfo->temperature = $request->input('temperature');
        $mInfo->Reason_for_visit = $request->input('medical_info');

        $pInfo->save();
        $fInfo->save();
        $mInfo->save();

        return view('admin.pages.Info.create')->with('message','Patiented added');
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
        //
    }
}
