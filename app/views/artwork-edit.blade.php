@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Artwork</h1>
    </div>
    
    <form action="{{ action('ArtworkController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $artwork->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="title" value="{{ $artwork->title }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Art Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $artwork->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="description" rows="4" cols="50">
            {{ $artwork->description }}
            </textarea>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ArtworkController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop