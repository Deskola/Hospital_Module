<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/hospitals', 'API\Hospitals');
Route::group(['prefix'=>'hospitals','name'=>'patients'], function(){
	Route::apiResource('/{hospitals}/patients', 'API\Patients');
});

//Route::apiResource('/patients', 'API\Patients');

// //Route::apiResource('/patients','API\PatientsController');
// Route::middleware(['api',''])-group( function(){
// 	Route::apiResource('/{hospitals}/patients','API\Patients');
	
// }));

