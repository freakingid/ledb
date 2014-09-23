<?php

// app/controllers/TourController

class TourController extends BaseController {

	public function index()
	{
	    // show listing of tours
	    return View::make('tour-index');
	}
	
	public function create()
	{
	    // show create tour form
	    return View::make('tour-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    
	}
	
	public function edit(Tour $tour)
	{
	    // show edit tour form
	    return View::make('tour-edit');
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('tour-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	}
}
