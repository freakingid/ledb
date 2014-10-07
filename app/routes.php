<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

// Right now this has all routes for all controllers

// default home listing
Route::get('/', 'PerformanceController@index');

// =======================================================================
Route::model('artwork', 'Artwork');
// artwork pages
Route::get('/artwork/', 'ArtworkController@index');
Route::get('/artwork/create', 'ArtworkController@create');
Route::get('/artwork/edit/{artwork}', 'ArtworkController@edit');
Route::get('/artwork/delete/{artwork}', 'ArtworkController@delete');

// artwork form handlers
Route::post('/artwork/create', 'ArtworkController@handleCreate');
Route::post('/artwork/edit', 'ArtworkController@handleEdit');
Route::post('/artwork/delete', 'ArtworkController@handleDelete');




// =======================================================================
Route::model('event', 'EventOccurrence');
// event pages
Route::get('/event/', 'EventOccurrenceController@index');
Route::get('/event/create', 'EventOccurrenceController@create');
Route::get('/event/edit/{event}', 'EventOccurrenceController@edit');
Route::get('/event/delete/{event}', 'EventOccurrenceController@delete');

// event form handlers
Route::post('/event/create', 'EventOccurrenceController@handleCreate');
Route::post('/event/edit', 'EventOccurrenceController@handleEdit');
Route::post('/event/delete', 'EventOccurrenceController@handleDelete');




// =======================================================================
Route::model('location', 'Location');
// location pages
Route::get('/location/', 'LocationController@index');
Route::get('/location/create', 'LocationController@create');
Route::get('/location/edit/{location}', 'LocationController@edit');
Route::get('/location/delete/{location}', 'LocationController@delete');

// location form handlers
Route::post('/location/create', 'LocationController@handleCreate');
Route::post('/location/edit', 'LocationController@handleEdit');
Route::post('/location/delete', 'LocationController@handleDelete');




// =======================================================================
Route::model('performance', 'Performance');
// performance pages
Route::get('/performance/', 'PerformanceController@index');
Route::get('/performance/create', 'PerformanceController@create');
Route::get('/performance/edit/{performance}', 'PerformanceController@edit');
Route::get('/performance/delete/{performance}', 'PerformanceController@delete');

// performance form handlers
Route::post('/performance/create', 'PerformanceController@handleCreate');
Route::post('/performance/edit', 'PerformanceController@handleEdit');
Route::post('/performance/delete', 'PerformanceController@handleDelete');




// =======================================================================
Route::model('person', 'Person');
// people pages
// #warning or is it /people/ -- pluralizer
Route::get('/person/', 'PersonController@index');
Route::get('/person/create', 'PersonController@create');
Route::get('/person/edit/{person}', 'PersonController@edit');
Route::get('/person/delete/{person}', 'PersonController@delete');

// people form handlers
Route::post('/person/create', 'PersonController@handleCreate');
Route::post('/person/edit', 'PersonController@handleEdit');
Route::post('/person/delete', 'PersonController@handleDelete');




// =======================================================================
Route::model('tour', 'Tour');
// tour pages
Route::get('/tour/', 'TourController@index');
Route::get('/tour/create', 'TourController@create');
Route::get('/tour/edit/{tour}', 'TourController@edit');
Route::get('/tour/delete/{tour}', 'TourController@delete');

// tour form handlers
Route::post('/tour/create', 'TourController@handleCreate');
Route::post('/tour/edit', 'TourController@handleEdit');
Route::post('/tour/delete', 'TourController@handleDelete');

