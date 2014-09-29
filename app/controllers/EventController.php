<?php

// app/controllers/EventController

class EventController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $events = Event::all();
	    return View::make('event-index', compact('events'));
	}
	
	public function create()
	{
	    // show create event form
	    return View::make('event-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $event = new Event;
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');
	    $event->timestart = Input::get('timestart');
	    $event->timeend = Input::get('timeend');
	    $event->save();
	    // get us back to index after saving
	    return Redirect::action('EventController@index');
	}
	
	public function edit(Event $event)
	{
	    // show edit form
	    return View::make('event-edit', compact('event'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $event = Event::findOrFail(Input::get('id'));
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');
	    $event->timestart = Input::get('timestart');
	    $event->timeend = Input::get('timeend');
	    $event->save();
	    // get us back to index after saving
	    return Redirect::action('EventController@index');
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('event-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('event');
	    $event = Event::findOrFail($id);
	    $event->delete();
	    // show list
	    return Redirect::action('EventController@index');
	}
}
