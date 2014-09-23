<?php

// app/controllers/PersonController

class PersonController extends BaseController {

	public function index()
	{
	    // show listing of people
	    return View::make('person-index');
	}
	
	public function create()
	{
	    // show create person form
	    return View::make('person-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    
	}
	
	public function edit(Person $person)
	{
	    // show edit person form
	    return View::make('person-edit');
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('person-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	}
}
