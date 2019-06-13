<?php

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
use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');

Route::resource('patient', 'PatientController');
Route::resource('payment', 'PatientPaymentsController');
Route::resource('appointment', 'AppointmentController');
Route::resource('staff', 'StaffController');
Route::resource('advance', 'AdvanceMoneyController');
Route::resource('salary', 'SalaryController');
Route::resource('dailyexpense', 'DialyExpenseController');
Route::resource('labratory', 'LabratoryController');
Route::resource('labratory_records', 'LabratoryRecordController');
Route::resource('laboratory_payment', 'LaboratoryPaymentController');
Route::resource('material', 'MaterialController');
Route::resource('profile', 'ProfileController');

Route::get('getloanamount','PageController@getloanamount');
Route::get('gettotalfee','PageController@gettotalfee');

Route::get('getaddress','PageController@getaddress');
Route::get('getphone','PageController@getphone');
Route::get('lastappointment','PageController@lastappointment');
Route::get('todayappointments','PageController@todayappointments');

Route::get('upcoming_appointments','PageController@upcoming_appointments');
Route::get('closed_appointments','PageController@closed_appointments');

Route::get('getadvance','PageController@getadvance');

Route::post('change_appointment_status','PageController@change_appointment_status');
Route::get('aboutus','PageController@aboutus');

Route::post('updatelab','PageController@updatelab');

Route::get('patientrecords/{id}','PageController@patientrecords');

Route::get('getlabloan','PageController@getlabloan');
Route::get('lab_records/{id}','PageController@lab_records');
Route::get('staffrecords/{id}','PageController@staffrecords');
Route::get('changepassword','PageController@changepassword');
Route::post('newpassword','PageController@newpassword')->name('newpassword');
Route::get('changeuserspassword','PageController@changeuserspassword');
Route::get('changeusersprofile','PageController@changeusersprofile');
Route::post('usernewpassword','PageController@usernewpassword')->name('usernewpassword');
Route::post('usernewprofile','PageController@usernewprofile')->name('usernewprofile');
Route::any('patienttotalreport','PageController@patienttotalreport');
Route::any('patientpaymentreport','PageController@patientpaymentreport');
Route::any('appointmentreport','PageController@appointmentreport');
Route::any('laboratoryordersreport','PageController@laboratoryordersreport');
Route::any('laboratorypaymentsreport','PageController@laboratorypaymentsreport');
Route::any('dailyexpensereport','PageController@dailyexpensereport');
Route::any('materialexpensereport','PageController@materialexpensereport');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
