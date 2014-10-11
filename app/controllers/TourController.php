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

        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $tour->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $tour->timeend = $dateTimeEnd;    
	    
	    $tour->save();
	    // get us back to index after saving
	    return Redirect::action('TourController@index');
	}
	
	public function edit(Tour $tour)
	{
	    // show edit form
	    return View::make('tour-edit', compact('tour'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $tour = Tour::findOrFail(Input::get('id'));
	    $tour->slug = Input::get('slug');
	    $tour->namefull = Input::get('namefull');
	    $tour->description = Input::get('description');

        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $tour->timestart = $dateTimeStart;
        $dateTimeEnd = date_create_from_format('Y-m-d H:i A', Input::get('timeend'));
	    $tour->timeend = $dateTimeEnd;    
	    
	    $tour->save();
	    // get us back to index after saving
	    return Redirect::action('TourController@index');
	}
	
	public function delete(Tour $tour)
	{
	    // show delete confirmation
	    return View::make('tour-delete', compact('tour'));
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('tour');
	    $tour = Tour::findOrFail($id);
	    $tour->delete();
	    // show list
	    return Redirect::action('TourController@index');
	}
}
