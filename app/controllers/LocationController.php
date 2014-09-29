<?php

// app/controllers/LocationController

class LocationController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $locations = Location::all();
	    return View::make('location-index', compact('locations'));
	}
	
	public function create()
	{
	    // show create location form
	    return View::make('location-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $location = new Location;
	    $location->slug = Input::get('slug');
	    $location->namefull = Input::get('namefull');
	    $location->description = Input::get('description');
	    $location->addr1 = Input::get('addr1');
	    $location->addr2 = Input::get('addr2');
	    $location->city = Input::get('city');
	    $location->state = Input::get('state');
	    $location->zip = Input::get('zip');
	    $location->email = Input::get('email');
	    $location->phone = Input::get('phone');
	    $location->save();
	    // get us back to index after saving
	    return Redirect::action('LocationController@index');
	}
	
	public function edit(Location $location)
	{
	    // show edit form
	    return View::make('location-edit', compact('location'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $location = Location::findOrFail(Input::get('id'));
	    $location->slug = Input::get('slug');
	    $location->namefull = Input::get('namefull');
	    $location->description = Input::get('description');
	    $location->addr1 = Input::get('addr1');
	    $location->addr2 = Input::get('addr2');
	    $location->city = Input::get('city');
	    $location->state = Input::get('state');
	    $location->zip = Input::get('zip');
	    $location->email = Input::get('email');
	    $location->phone = Input::get('phone');
	    $location->save();
	    // get us back to index after saving
	    return Redirect::action('LocationController@index');
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('location-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('location');
	    $location = Location::findOrFail($id);
	    $location->delete();
	    // show list
	    return Redirect::action('LocationController@index');
	}
}
