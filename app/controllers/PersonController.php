<?php

// app/controllers/PersonController

class PersonController extends BaseController {

	public function index()
	{
		// show listing of
	    #warning business logic should be moved out to service
	    $people = Person::all();
	    return View::make('person-index', compact('people'));
	}
	
	public function create()
	{
	    // show create person form
	    return View::make('person-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $person = new Person;
	    $person->username = Input::get('username');
	    $person->namefirst = Input::get('namefirst');
	    $person->namelast = Input::get('namelast');
	    
        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $person->dob = $dateTimeStart;

	    $person->email = Input::get('email');
	    $person->save();
	    // get us back to index after saving
	    return Redirect::action('PersonController@index');
	}
	
	public function edit(Person $person)
	{
	    // show edit form
	    return View::make('person-edit', compact('person'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $person = Person::findOrFail(Input::get('id'));
	    $person->username = Input::get('username');
	    $person->namefirst = Input::get('namefirst');
	    $person->namelast = Input::get('namelast');
	    
        // if DateTime fails to parse, will return false!
	    $dateTimeStart = date_create_from_format('Y-m-d H:i A', Input::get('timestart'));
        $person->dob = $dateTimeStart;

	    $person->email = Input::get('email');
	    $person->save();
	    // get us back to index after saving
	    return Redirect::action('PersonController@index');
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('person-delete');
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('person');
	    $person = Person::findOrFail($id);
	    $person->delete();
	    // show list
	    return Redirect::action('PersonController@index');
	}
}
