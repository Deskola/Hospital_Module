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
        <h1 style="margin-left:20px;">Add Patient's Personal Information</h1>
            <form class="form-horizontal" action="/patients" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <p class="text-info">Hospital Name</p>

                <div class="col-sm-8">
                   <input list="browsers" name="hospital_name" id="hospital_name" placeholder="Search Hospital Name" class="col-lg-9 custom-select custom-select-sm" required>
                    <datalist id="browsers">                                     
                        <option value="Kenyatta">Kenyatta Hospital</option>
                        <option value="Mbagathi">Mbagathi Hospital</option>
                        <option value="Jaramogi">Jaramogi Hospital</option>
                        <option value="Agha_Khan">Agha Khan Hospital</option>
                        <option value="Getrude">Getrude Hospital</option>
                    </datalist></div> 
               <hr>


            <!--Check for sucess message-->
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif

                  <div class="card-body">
                    <p class="text-info">Patient's Personal Information</p>

                      <div class="row">
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="surname" class="col-sm-4 control-label">Surname</label>

                                  <div class="col-sm-8">
                                      <input type="text" name="surname"class="form-control" id="surname" placeholder="Surname" value="{{old('surname')}}" required>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="fname" class="col-sm-4 control-label">First Name</label>

                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{old('first_name')}}" required>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="other_name" class="col-sm-4 control-label">Other Name</label>

                                  <div class="col-sm-8">
                                      <input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="{{old('other_name')}}" required>
                                  </div>
                              </div>
                          </div>
                      </div><br>
                      
                      <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="Date_of_Birth" class=" control-label">Pick date of Birth</label>
                                    <input type="date" class="form-control" name="Date_of_Birth" placeholder="Date Of birth" value="{{old('Date_of_Birth')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="religion" class="control-label">National Identification Number</label>
                                    <input type="number" class="form-control" name="national_id" id="national_id" placeholder="Natioanl ID/Huduma Number" required="">                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="school_attended" class=" control-label">Residential Area</label>
                                    <input type="text" name="residential_area" class="form-control" id="residential_area" placeholder="Residential Area" required>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="col-sm-9">
                                    <label class=" control-label">Email Address or Phone number</label>
                                    <input type="text" class="form-control" name="email_address_or_phone" id="email_address" placeholder="Email address or Phone Number" required>
                                </div>
                            </div>
                        </div></div><hr>

                <p class="text-info">Family Medical Information</p>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-md-9">
                                <label for="religion" class="control-label">Family member Affected</label>
                                <input type="text" class="form-control" name="family_member" id="family_member" placeholder="Hereditary Diseases">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="religion" class="control-label">Hereditary Diseases</label>
                                    <input type="text" class="form-control" name="hereditary_diseases" id="hereditary_diseases" placeholder="Hereditary Diseases">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-9">                                    
                                <label for="Date_of_Birth" class=" control-label">Mental health conditionsh and Substance Abusepregnancy_complication</label>
                                <textarea class="form-control"name="mental_health_condition" rows="5" >{{old('')}}</textarea>                            
                            </div>
                            </div>                          
                        </div>
                        <div class="col-lg-6">
                         
                        <div class="form-group">
                            <div class="col-sm-9">                                    
                                <label for="Date_of_Birth" class=" control-label">Pregnancy complications</label>
                                <textarea class="form-control"name="pregnancy_complications" rows="5" >{{old('')}}</textarea>                           
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">                                    
                                <label for="Date_of_Birth" class=" control-label">Deceased relatives cause of death</label>
                                <textarea class="form-control"name="cause_of_death" rows="5" >{{old('')}}</textarea>                           
                            </div>
                        </div>
                            
                        </div></div>  
                        <hr> 

                <p class="text-info">Medical History Information</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="Date_of_Birth" class=" control-label">Weight</label>
                                    <input type="text" class="form-control" name="weight" placeholder="weight"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="religion" class="control-label">Height</label>
                                    <input type="text" class="form-control" name="height" id="height" placeholder="height" required>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <label for="school_attended" class=" control-label">Blood Pessure</label>
                                    <input type="text" name="blood_pressure" class="form-control" id="blood_pressure" placeholder="Blood Pressure" required>
                                </div>
                            </div>

                             <div class="form-group">
                                <div class="col-sm-9">
                                    <label class=" control-label">Temperature</label>
                                    <input type="text" class="form-control" name="temperature" id="temperature" placeholder="Temperature" required>
                                </div>
                            </div>
                        </div></div>
                        <div class="form-group">
                            <label>Description of the reason for current visit</label>
                            <textarea class="form-control"name="medical_info" rows="5" required></textarea>
                        </div><hr> 
                                            

                      <div class="form-group">
                          <button  type="submit"  class="btn btn-primary mb-2">Submit Details</button>
                      </div>
                  </div>

                            
                      
  @endsection
