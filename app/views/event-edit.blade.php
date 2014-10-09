@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Event</h1>
    </div>
    
    <form action="{{ action('EventOccurrenceController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $event->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $event->slug }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Event Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $event->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4" >{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" value="{{ $event->timestart }}" />
        </div>
        <div class="form-group">
            <label for="timeend">End date / time</label>
            <input type="text" id="endPicker" class="form-control" name="timeend" value="{{ $event->timeend }}" />
        </div>
        <div class="form-group".
            <label for="tour">Tour</label><br />
            <p>Here we need to use a single-select method listing available tours.</p>
            <p>We still need logic like in Artwork to select the currently-assigned item.</p>
            <select class="form-control" name="tour">
            @foreach ($tours as $tour)
                <option value="{{ $tour->id }}"{{($tour->selected) ? ' selected' : ''}}>{{ $tour->namefull }} </option>
            @endforeach
            </select>
        </div>
        <div class="form-group".
            <label for="location">Location</label><br />
            <p>Here we need to use a single-select method listing available locations.</p>
            <p>We still need logic like in Artwork to select the currently-assigned item.</p>
            <select class="form-control" name="location">
            @foreach ($locations as $location)
                <option value="{{ $location->id }}"{{($location->selected) ? ' selected' : ''}}>{{ $location->namefull }} </option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="Save" class="btn btn-primary" />
        <a href="{{ action('EventOccurrenceController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop