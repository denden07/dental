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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin-dashboard','DashboardController@index')->name('dashboard.home');

//Patient
Route::get('patient-list','PatientController@list')->name('patient.list');

Route::post('patient-store','PatientController@addPatient')->name('patient.store');