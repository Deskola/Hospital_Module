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
Route::resource('/patients','PersonalInfoController');

Route::resource('/medicationInfo','MedicationHistController');
// Route::get('/medicationInfo',"MedicationHistController@create");
// Route::post('/medicationInfo','MedicationHistController@store');
