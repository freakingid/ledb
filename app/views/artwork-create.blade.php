@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Artwork</h1>
    </div>
    
    <form action="{{ action('ArtworkController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Art Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea  name="description" rows="4" cols="50" placeholder="Describe this work of art."></textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('ArtworkController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop