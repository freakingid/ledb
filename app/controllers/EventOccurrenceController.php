<?php

// app/controllers/EventOccurrenceController

class EventOccurrenceController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $events = EventOccurrence::all();
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
	    $event = new EventOccurrence;
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');

        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $event->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $event->timeend = $dateTimeEnd;    
	    
	    $event->save();
	    // get us back to index after saving
	    return Redirect::action('EventOccurrenceController@index');
	}
	
	public function edit(EventOccurrence $event)
	{
	    // show edit form
	    return View::make('event-edit', compact('event'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $event = EventOccurrence::findOrFail(Input::get('id'));
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');

        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $event->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $event->timeend = $dateTimeEnd;    
	    
	    $event->save();
	    // get us back to index after saving
	    return Redirect::action('EventOccurrenceController@index');
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
	    $event = EventOccurrence::findOrFail($id);
	    $event->delete();
	    // show list
	    return Redirect::action('EventOccurrenceController@index');
	}
}
