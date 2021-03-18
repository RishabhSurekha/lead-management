<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@home')->name('home');
Route::view('/database', 'database')->name('database');
Route::get('/export', 'LeadController@export')->name('export');
Route::view('/leads-submitted', 'leadsSubmitted')->name('leads-submitted');
Route::view('/leads-assigned', 'leadsAssigned')->name('leads-assigned');
Route::view('/analytics', 'analytics')->name('analytics');



// Personal API requiring auth
Route::get('myapi/leads-submitted', 'LeadController@leads_submitted');
Route::get('myapi/leads-assigned', 'LeadController@leads_assigned');
Route::post('myapi/addLead', 'LeadController@addLead')->name('add-lead');
Route::get('myapi/leads-submitted-analytics', 'LeadController@leads_submitted_analytics');
Route::get('myapi/leads-assigned-analytics', 'LeadController@leads_assigned_analytics');
