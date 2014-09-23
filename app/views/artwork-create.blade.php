@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Artwork</h1>
    </div>
    
    <form action="{{ action('ArtworkController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="title" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Art Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="description" rows="4" cols="50">
            Default description? Or placeholder please.
            </textarea>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('ArtworkController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop