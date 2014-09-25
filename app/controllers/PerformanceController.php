<?php

// app/controllers/PerformanceController

class PerformanceController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $performances = Performance::all();
	    return View::make('performance-index', compact('performances'));
	}
	
	public function create()
	{
	    // show create performance form
	    return View::make('performance-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    
	}
	
	public function edit(Performance $performance)
	{
	    // show edit performance form
	    return View::make('performance-edit');
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('performance-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	}
}
