<?php

// app/controllers/LocationController

class LocationController extends BaseController {

	public function index()
	{
	    // show listing of locations
	    return View::make('location-index');
	}
	
	public function create()
	{
	    // show create location form
	    return View::make('location-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    
	}
	
	public function edit(Location $location)
	{
	    // show edit location form
	    return View::make('location-edit');
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('location-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	}
}
