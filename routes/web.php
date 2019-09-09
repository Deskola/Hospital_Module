<?php
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inc.dashboard');
});
//route to the main dashboard
Route::get('/dashboard','DashboardController@index');

//route a patient's personal info
//Route::get('/patients','PagesController@personalInfo');
Route::resource('/patients','PersonalInfoController');
//Route::get('/viewPatients','PersonalInfoController@index');
//Route::post('/addPatient','PersonalInfoController@store');
//Route::resource('personalHist','PersonalInfoController');

//route to medical history
//Route::get('/addMedicalHist','MedicalHistController@create');
//Route::resource('/medicalInfo','MedicalHistController');

//route to family medical history
//Route::get('/addFamilyHist','FamilyHistController@create');
//Route::resource('familyHist','FamilyHistController');

//route to medication history
//Route::get('/addMedicationHist','MedicationHistController@create');
Route::resource('/medicationInfo','MedicationHistController');
Route::post('/search','MedicationHistController@search');

//route to tratment 
//Route::get('/addTreatmentHist','TreatmentHistController@create');
//Route::resource('treatmentHist','TreatmentHistController');