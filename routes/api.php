<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// List leads
Route::get('leads', 'LeadController@index');

// List single lead
Route::get('lead/{id}', 'LeadController@show');

// Create new lead
Route::post('lead', 'LeadController@store');

// Update lead
Route::put('lead', 'LeadController@store');

// Validate lead
Route::put('validate-lead/{id}', 'LeadController@validateLead');

// Reject lead
Route::put('reject-lead/{id}', 'LeadController@rejectLead');

// Close lead
Route::put('close-lead/{id}', 'LeadController@closeLead');

// Delete lead
Route::delete('lead/{id}', 'LeadController@destroy');

// Get leads submitted by user
Route::get('leads-submitted', 'LeadController@leads_submitted');

// Analysis of segments by leads
Route::get('segment-leads-analytics', 'LeadController@segment_leads_analytics');

// Analysis of segments by value
Route::get('segment-value-analytics', 'LeadController@segment_value_analytics');
