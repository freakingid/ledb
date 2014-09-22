<?php

// app/controllers/EventController

class EventController extends BaseController {

	public function index()
	{
	    // show listing of events
	    return View::make('index'); // #warning incomplete -- doesn't know what model type
	}
	
	public function create()
	{
	    // show create event form
	    return View::make('create'); // #warning incomplete -- doesn't know what model type
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    
	}
	
	public function edit(Event $event)
	{
	    // show edit event form
	    return View::make('edit'); // #warning incomplete -- doesn't know what model type
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('delete'); // #warning incomplete -- doesn't know what model type
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	}
}
