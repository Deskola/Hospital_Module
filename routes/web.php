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
Route::get('/addPatient','PersonalInfoController@create');
Route::get('/viewpatient','PersonalInfoController@index');

//route to medical history
Route::get('/addMedicalHist','MedicalHistController@create');

//route to family medical history
Route::get('/addFamilyHist','FamilyHistController@create');

//route to medication history
Route::get('/addMedicationHist','MedicationHistController@create');

//route to tratment 
Route::get('/addTreatmentHist','TreatmentHistController@create');