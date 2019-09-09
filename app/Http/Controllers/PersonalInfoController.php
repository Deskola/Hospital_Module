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
            'pregnancy_complication'=>'required',
            'cause_of_death'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'blood_pressure'=>'required',
            'temperature'=>'required',
            'medical_info'=>'required'
        ]);

        return '123';
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
