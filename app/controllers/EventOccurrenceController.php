<?php

// app/controllers/EventOccurrenceController

class EventOccurrenceController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    // TODO we need the name and link for tour and location, rather than just the referenced id
	    $events = EventOccurrence::all();
	    return View::make('event-index', compact('events'));
	}
	
	public function create()
	{
	    // get all tours and locations
	    $tours = Tour::all();
	    $locations = Location::all();
	    // show create event form
	    return View::make('event-create', compact('tours', 'locations'));
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $event = new EventOccurrence;
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');

        // TODO if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $event->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $event->timeend = $dateTimeEnd;    
	    
	    $tour = Tour::Find(Input::get('tour'));
	    $event->tour()->associate($tour);
	    
	    $location = Location::Find(Input::get('location'));
	    $event->location()->associate($location);
	    
	    $event->save();

	    // get us back to index after saving
	    return Redirect::action('EventOccurrenceController@index');
	}
	
	public function edit(EventOccurrence $event)
	{
        // all possible tours
        $tours = Tour::all();
        // TODO There might be a simpler way to do this, since only ONE tour can be assigned
        // all tours assigned to current event
        $assignedTour = $event->tour()->get();
        // add "selected" on tours list to those assigned
        $tours->each( function( $tour ) use ( $assignedTour )
        {
            if( $assignedTour->contains( $tour->id ) ) {
                $tour->selected = true;
            }
        });

        // all possible locations
        $locations = Location::all();
        // TODO There might be a simpler way to do this, since only ONE location can be assigned
        // all locations assigned to current event
        $assignedLocation = $event->location()->get();
        // add "selected" on locations list to those assigned
        $locations->each( function( $location ) use ( $assignedLocation )
        {
            if( $assignedLocation->contains( $location->id ) ) {
                $location->selected = true;
            }
        });
        
	    // show edit form
	    return View::make('event-edit', compact('event', 'tours', 'locations'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $event = EventOccurrence::findOrFail(Input::get('id'));
	    $event->slug = Input::get('slug');
	    $event->namefull = Input::get('namefull');
	    $event->description = Input::get('description');

        // TODO if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $event->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $event->timeend = $dateTimeEnd;    
	    
	    $tour = Tour::Find(Input::get('tour'));
	    $event->tour()->associate($tour);
	    
	    $location = Location::Find(Input::get('location'));
	    $event->location()->associate($location);

	    $event->save();
	    // get us back to index after saving
	    return Redirect::action('EventOccurrenceController@index');
	}
	
	public function delete(EventOccurrence $event)
	{
	    // show delete confirmation
	    return View::make('event-delete', compact('event'));
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
