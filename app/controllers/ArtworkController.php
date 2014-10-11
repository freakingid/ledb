<?php

// app/controllers/ArtworkController

class ArtworkController extends BaseController {

	public function index()
	{
	    // show listing of artworks
	    #warning business logic should be moved out to service
	    $artworks = Artwork::all();
	    return View::make('artwork-index', compact('artworks'));
	}
	
	public function create()
	{
	    // we need to get all people so create artwork form can list them
	    $people = Person::all();
	    // show create artwork form
	    return View::make('artwork-create', compact('people'));
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $artwork = new Artwork;
	    $artwork->slug = Input::get('slug');
	    $artwork->namefull = Input::get('namefull');
	    $artwork->description = Input::get('description');
	    $artwork->save();
	    
	    // 1. using sync, we hand an array and the array is explicitly all the $people associated (not additive)
	    // 2. using saveMany, we can do union (WE want Sync though!!)
	    // $people is an array of Person ids
	    $people = Input::get('author'); // author[] multiselect from create view
	    $artwork->people()->sync($people);
	    
	    // get us back to index after saving
	    return Redirect::action('ArtworkController@index');
	}
	
	public function edit(Artwork $artwork)
	{
	    // all possible people to select authors from
	    // or filter results by persons who are not authors on this work??
	    $people = Person::all();
	    // all people assigned as authors to current artwork
	    $assignedAuthors = $artwork->people()->get();
	    // add 'selected' property on people list to those who are authors
	    $people->each( function( $person ) use ( $assignedAuthors )
	    {
	        if( $assignedAuthors->contains( $person->id ) ) {
	            $person->selected = true;
	        }
	    });

	    // show edit form
	    return View::make('artwork-edit', compact('artwork', 'people') );
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $artwork = Artwork::findOrFail(Input::get('id'));
	    $artwork->slug = Input::get('slug');
	    $artwork->namefull = Input::get('namefull');
	    $artwork->description = Input::get('description');
	    $artwork->save();

	    $people = Input::get('author'); // author[] multiselect from create view
	    $artwork->people()->sync($people);

	    // show list
	    return Redirect::action('ArtworkController@index');
	}
	
	public function delete(Artwork $artwork)
	{
	    // show delete confirmation
	    return View::make('artwork-delete', compact('artwork'));
	}
	
	public function handleDelete()
	{
	    // handle delete confirmation form
	    $id = Input::get('artwork');
	    $artwork = Artwork::findOrFail($id);
	    $artwork->delete();
	    // show list
	    return Redirect::action('ArtworkController@index');
	}
}
