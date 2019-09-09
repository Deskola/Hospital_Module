@extends('admin.index')
  @section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Student</h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Patient </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <p class="text-info">Patient's Identification</p>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="surname" class="col-sm-4 control-label">National ID</label>
                        <form action="/medicationInfo" method="POST" role="search" >
                          {{ csrf_field() }}
                          <div class="input-group">
                              <input type="text" class="form-control" name="nationl_id"
                                  placeholder="Search users"> <span class="input-group-btn">
                                  <button type="submit" class="btn btn-primary" name="form1">
                                    <i class="fa fa-search"></i>
                                  </button>                                  
                              </span>
                          </div>
                      </form>                        
                    </div>
                </div>                          
            </div>
            
            
                    
        <h1 style="margin-left:20px;">Add Patient's Medication Information</h1>
            <form class="form-horizontal" action="/medicationInfo" enctype="multipart/form-data" method="post">
                {{csrf_field()}}



            <!--Check for sucess message-->
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif

                  <div class="card-body">
                    <br> 
                      <p class="text-info">Medical Information</p>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="religion" class="control-label">Problem List</label>
                                     <textarea class="form-control"name="problem_list" rows="5" required >{{old('')}}</textarea>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <label for="religion" class="control-label">Allergies</label>
                                         <textarea class="form-control"name="allergies_doc" rows="5" required >{{old('')}}</textarea>  
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-9">                                    
                                    <label for="Date_of_Birth" class=" control-label">Drug Abuse</label>
                                    <textarea class="form-control"name="drug_abuse" rows="5" required >{{old('')}}</textarea>                            
                                </div>
                                </div>                          
                            </div>
                            <div class="col-lg-6">
                             
                            <div class="form-group">
                                <div class="col-sm-9">                                    
                                    <label for="Date_of_Birth" class=" control-label">Current medications being taken</label>
                                    <textarea class="form-control"name="medication_used" rows="5" required >{{old('')}}</textarea>                           
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">                                    
                                    <label for="Date_of_Birth" class=" control-label">Diagnostics Test result</label>
                                    <textarea class="form-control"name="diag_test_res" rows="5" required >{{old('')}}</textarea>                           
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">                                    
                                    <label for="Date_of_Birth" class=" control-label">Inpatients/ER discharge</label>
                                    <select name="patient_type">
                                      <option value="inPateint">In patient</option>
                                      <option value="outPateint">Out patient</option>
                                    </select>                           
                                </div>
                            </div>
                                
                            </div></div>  
                            <hr> 

                    <p class="text-info">Treatment Information</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <label for="Date_of_Birth" class=" control-label">Drug Prescription</label>
                                         <textarea class="form-control"name="prescription" rows="5" required>{{old('')}}</textarea>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <label for="religion" class="control-label">Medical Consultation Info</label>
                                         <textarea class="form-control"name="med_conslt_info" rows="5" required>{{old('')}}</textarea>                                     
                                    </div>
                                </div>
                            </div>
            
          </div></div>
          <div class="form-group">
              <label>Doctors Advice</label>
              <textarea class="form-control"name="doc_advice" rows="5" required></textarea>
          </div><hr>                             

        <div class="form-group">
            <button  type="submit"  class="btn btn-primary mb-2" name="form2">Submit Details</button>
        </div>
    </div>                            
                      
  @endsection
