<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\personalInfo;
use App\medicationInfo;
use App\treatmentInfo;

class MedicationHistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pages.medicationHistory.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.medicationHistory.create');
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
       
        if ($request->has('form1')) {

            $id = $request->input("nationl_id");
            $query = personalInfo::where('national_id',$id)->get();
            //$query = personalInfo::all();      

            //return view('admin.pages.medicationHistory.create')->with('query',$query);
            //return view('admin.pages.medicationHistory.create');
            return var_dump($query);
           // return "Search";
        }

        if ($request->has('form2')) {            
            
                $this->validate($request,[
                'problem_list'=>'required',
                'allergies_doc'=>'required',
                'drug_abuse'=>'required',
                'medication_used'=>'required',
                'diag_test_res'=>'required',
                'patient_type'=>'required',
                'prescription'=>'required',
                'med_conslt_info'=>'required',
                'doc_advice'=>'required',
            ]);

            $mInfo = new medicationInfo;
            $mInfo->personal_id = $request->input('personal_id');
            $mInfo->problem_list = $request->input('problem_list');
            $mInfo->allergies = $request->input('allergies_doc');
            $mInfo->drug_abuse = $request->input('drug_abuse');
            $mInfo->drug_abuse = $request->input('medication_used');
            $mInfo->current_medication = $request->input('diag_test_res');
            $mInfo->patient_type = $request->input('patient_type');
            

            $tInfo = new treatmentInfo; 
            $tInfo->personal_id = $request->input('personal_id');
            $tInfo->prescription = $request->input('prescription');
            $tInfo->consultation = $request->input('med_conslt_info');
            $tInfo->advice = $request->input('doc_advice');

            $mInfo->save();
            $tInfo->save();

            return view('admin.pages.medicationHistory.create')->with('message','Success');

        }

        
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
