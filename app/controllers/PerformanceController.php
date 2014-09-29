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
	    $performance = new Performance;
	    $performance->slug = Input::get('slug');
	    $performance->namefull = Input::get('namefull');
	    $performance->description = Input::get('description');
	    $performance->timestart = Input::get('timestart');
	    $performance->rating = Input::get('rating');
	    $performance->save();
	    // get us back to index after saving
	    return Redirect::action('PerformanceController@index');
	}
	
	public function edit(Performance $performance)
	{
	    // show edit form
	    return View::make('performance-edit', compact('performance'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $performance = Performance::findOrFail(Input::get('id'));
	    $performance->slug = Input::get('slug');
	    $performance->namefull = Input::get('namefull');
	    $performance->description = Input::get('description');
	    $performance->timestart = Input::get('timestart');
	    $performance->rating = Input::get('rating');
	    $performance->save();
	    // get us back to index after saving
	    return Redirect::action('PerformanceController@index');
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('performance-delete');
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
