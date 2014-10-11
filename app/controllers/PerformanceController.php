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
        // we need list of all artworks and events, to associate with Performance
        $artworks = Artwork::all();
        $events = EventOccurrence::all();
	    $people = Person::all();
	    // show create performance form
	    return View::make('performance-create', compact('artworks', 'events', 'people'));
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $performance = new Performance;
	    $performance->slug = Input::get('slug');
	    $performance->namefull = Input::get('namefull');
	    $performance->description = Input::get('description');
	    
        // TODO if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $performance->timestart = $dateTimeStart;

	    $performance->rating = Input::get('rating');
	    
	    // one Artwork item
	    $artwork = Artwork::Find(Input::get('artwork'));
	    $performance->artwork()->associate($artwork);

	    // one Event item
	    Log::info('Getting eventoccurrence to associate');
	    $event = EventOccurrence::Find(Input::get('event'));
	    $performance->event()->associate($event);
	    
	    Log::info('Saving performance');
	    // need to save before we have an ID for pivot table
	    $performance->save();
	    
        // one or more Person item(s)
	    $people = Input::get('actor'); // actor[] multiselect from create view
	    $performance->people()->sync($people); // sync vs save
	    
	    // $performance->save();
	    // get us back to index after saving
	    return Redirect::action('PerformanceController@index');
	}
	
	public function edit(Performance $performance)
	{
        // we need list of all artworks and events, to associate with Performance
        $artworks = Artwork::all();
        $events = EventOccurrence::all();
        // need currently-assigned artwork and event (single)
        // TODO There might be a simpler way to do this, since only ONE tour can be assigned
        // (this method is also used to get multiples, so maybe there is more efficient...)
        $assignedArtwork = $performance->artwork()->get();
        $assignedEvent = $performance->event()->get();
        // need to mark assigned elements in $artworks and $events as selected
        // TODO this doesn't seem scalable -- stepping through ALL artworks
        // and this pattern is used in many places (Controllers@edit) so keep in mind
        // selected artwork
        $artworks->each( function( $artwork ) use ( $assignedArtwork )
        {
            if( $assignedArtwork->contains( $artwork->id ) ) {
                $artwork->selected = true;
                // at very least, can we short-circuit here since we are only after one item?
            }
        });
        // selected event
        $events->each( function( $event ) use ( $assignedEvent )
        {
            if( $assignedEvent->contains( $event->id ) ) {
                $event->selected = true;
                // at very least, can we short-circuit here since we are only after one item?
            }
        });
        
        // slightly different from $artworks and $events, as we can have multiple selected Persons
	    // all possible people to select actors from
	    $people = Person::all();
	    // all people assigned as actors to current performance
	    $assignedActors = $performance->people()->get();
	    // add 'selected' property on people list to those who are actors
	    $people->each( function( $person ) use ( $assignedActors )
	    {
	        if( $assignedActors->contains( $person->id ) ) {
	            $person->selected = true;
	        }
	    });

	    // show edit form
	    return View::make('performance-edit', compact('performance', 'artworks', 'events', 'people'));
	}
	
	public function handleEdit()
	{
	    Log::info('Getting current performance');
	    // handle edit form submission
	    $performance = Performance::findOrFail(Input::get('id'));
	    $performance->slug = Input::get('slug');
	    $performance->namefull = Input::get('namefull');
	    $performance->description = Input::get('description');
	    Log::info('Got performance successfully');
	    
        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $performance->timestart = $dateTimeStart;

	    $performance->rating = Input::get('rating');

        Log::info('Getting artwork to associate');
	    $artwork = Artwork::Find(Input::get('artwork'));
	    $performance->artwork()->associate($artwork);

        Log::info('Getting EventOccurrence to associate');	    
	    $event = EventOccurrence::Find(Input::get('event'));
	    $performance->event()->associate($event);
	    
	    Log::info('Saving performance');
	    
	    $performance->save();

        Log::info('Getting actors to associate with performance');
	    $people = Input::get('actor'); // actor[] multiselect from create view
	    $performance->people()->sync($people);

	    // get us back to index after saving
	    return Redirect::action('PerformanceController@index');
	}
	
	public function delete(Performance $performance)
	{
	    // show delete confirmation
	    return View::make('performance-delete', compact('performance'));
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('performance');
	    $performance = Performance::findOrFail($id);
	    $performance->delete();
	    // show list
	    return Redirect::action('PerformanceController@index');
	}
}
