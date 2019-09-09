<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\personalInfo;

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
            //$query = personalInfo::where('national_id',$id)->get();
            $query = personalInfo::all();      

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

            return "12345";
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
