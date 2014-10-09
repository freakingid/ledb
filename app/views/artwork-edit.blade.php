@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Artwork</h1>
    </div>
    
    <form action="{{ action('ArtworkController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $artwork->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $artwork->slug }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Art Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $artwork->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4">{{ $artwork->description }}</textarea>
        </div>
        <div class="form-group".
            <label for="authors">Author(s)</label><br />
            <select class="form-control" multiple name="author[]">
            @foreach ($people as $person)
                <option value="{{ $person->id }}"{{($person->selected) ? ' selected' : ''}}>{{ $person->namefirst . ' ' . $person->namelast }} </option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('ArtworkController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop