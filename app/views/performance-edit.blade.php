@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Performance</h1>
    </div>
    
    <form action="{{ action('PerformanceController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $performance->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $performance->slug }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Performance Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $performance->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4">{{ $performance->description }}"</textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" value="{{ $performance->timestart }}" />
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input class="form-control" type="radio" name="rating" value="0">0<br />
            <input class="form-control" type="radio" name="rating" value="1">1<br />
            <input class="form-control" type="radio" name="rating" value="2">2<br />
            <input class="form-control" type="radio" name="rating" value="3">3<br />
            <input class="form-control" type="radio" name="rating" value="4">4<br />
            <input class="form-control" type="radio" name="rating" value="5">5<br />
        </div>
        <div class="form-group".
            <label for="artwork">Artwork</label><br />
            <p>Here we need to use a single-select method listing available artworks.</p>
        </div>
        <div class="form-group".
            <label for="event">Event</label><br />
            <p>Here we need to use a single-select method listing available events.</p>
        </div>
        <div class="form-group".
            <label for="people">People</label><br />
            <p>Here we need to use a multiple-select method listing available persons as actors etc.</p>
        </div>
        <input type="submit" value="Edit" class="btn btn-primary" />
        <a href="{{ action('PerformanceController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop