<?php

// app/controllers/TourController

class TourController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $tours = Tour::all();
	    return View::make('tour-index', compact('tours'));
	}
	
	public function create()
	{
	    // show create tour form
	    return View::make('tour-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $tour = new Tour;
	    $tour->slug = Input::get('slug');
	    $tour->namefull = Input::get('namefull');
	    $tour->description = Input::get('description');
	    $tour->timestart = Input::get('timestart');
	    $tour->timeend = Input::get('timeend');
	    $tour->save();
	    // get us back to index after saving
	    return Redirect::action('TourController@index');
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
