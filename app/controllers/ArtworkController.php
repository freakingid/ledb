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
	    // show create artwork form
	    return View::make('artwork-create');
	}
	
	public function handleCreate()
	{
	    // handle creation form submission
	    $artwork = new Artwork;
	    $artwork->slug = Input::get('slug');
	    $artwork->namefull = Input::get('namefull');
	    $artwork->description = Input::get('description');
	    $artwork->save();
	    // get us back to index after saving
	    return Redirect::action('ArtworkController@index');
	}
	
	public function edit(Artwork $artwork)
	{
	    // show edit form
	    return View::make('artwork-edit', compact('artwork'));
	}
	
	public function handleEdit()
	{
	    // handle edit form submission
	    $artwork = Artwork::findOrFail(Input::get('id'));
	    $artwork->slug = Input::get('slug');
	    $artwork->namefull = Input::get('namefull');
	    $artwork->description = Input::get('description');
	    $artwork->save();
	    // show list
	    return Redirect::action('ArtworkController@index');
	}
	
	public function delete()
	{
	    // show delete confirmation
	    return View::make('artwork-delete');
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
