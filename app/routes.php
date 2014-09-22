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

// bind route parameters
Route::model('artwork', 'Artwork');
Route::model('event', 'Event');
Route::model('location', 'Location');
Route::model('performance', 'Performance');
Route::model('person', 'Person');
Route::model('tour', 'Tour');

// default home listing
Route::get('/', 'PerformanceController@index');

// =======================================================================
// artwork pages
Route::get('/artwork/', 'ArtworkController@index');
Route::get('/artwork/create', 'ArtworkController@create');
Route::get('/artwork/edit/{artwork}', 'ArtworkController@edit');
Route::get('/artwork/delete/{artwork}', 'ArtworkController@delete');

// artwork form handlers
Route::get('/artwork/create', 'ArtworkController@handleCreate');
Route::get('/artwork/edit', 'ArtworkController@handleEdit');
Route::get('/artwork/delete', 'ArtworkController@handleDelete');




// =======================================================================
// event pages
Route::get('/event/', 'EventController@index');
Route::get('/event/create', 'EventController@create');
Route::get('/event/edit/{event}', 'EventController@edit');
Route::get('/event/delete/{event}', 'EventController@delete');

// event form handlers
Route::get('/event/create', 'EventController@handleCreate');
Route::get('/event/edit', 'EventController@handleEdit');
Route::get('/event/delete', 'EventController@handleDelete');




// =======================================================================
// location pages
Route::get('/location/', 'LocationController@index');
Route::get('/location/create', 'LocationController@create');
Route::get('/location/edit/{location}', 'LocationController@edit');
Route::get('/location/delete/{location}', 'LocationController@delete');

// location form handlers
Route::get('/location/create', 'LocationController@handleCreate');
Route::get('/location/edit', 'LocationController@handleEdit');
Route::get('/location/delete', 'LocationController@handleDelete');




// =======================================================================
// performance pages
Route::get('/performance/', 'PerformanceController@index');
Route::get('/performance/create', 'PerformanceController@create');
Route::get('/performance/edit/{performance}', 'PerformanceController@edit');
Route::get('/performance/delete/{performance}', 'PerformanceController@delete');

// performance form handlers
Route::get('/performance/create', 'PerformanceController@handleCreate');
Route::get('/performance/edit', 'PerformanceController@handleEdit');
Route::get('/performance/delete', 'PerformanceController@handleDelete');




// =======================================================================
// people pages
// #warning or is it /people/ -- pluralizer
Route::get('/person/', 'PersonController@index');
Route::get('/person/create', 'PersonController@create');
Route::get('/person/edit/{person}', 'PersonController@edit');
Route::get('/person/delete/{person}', 'PersonController@delete');

// people form handlers
Route::get('/person/create', 'PersonController@handleCreate');
Route::get('/person/edit', 'PersonController@handleEdit');
Route::get('/person/delete', 'PersonController@handleDelete');




// =======================================================================
// tour pages
Route::get('/tour/', 'TourController@index');
Route::get('/tour/create', 'TourController@create');
Route::get('/tour/edit/{tour}', 'TourController@edit');
Route::get('/tour/delete/{tour}', 'TourController@delete');

// tour form handlers
Route::get('/tour/create', 'TourController@handleCreate');
Route::get('/tour/edit', 'TourController@handleEdit');
Route::get('/tour/delete', 'TourController@handleDelete');

