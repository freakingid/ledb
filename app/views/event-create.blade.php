@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Event</h1>
    </div>
    
    <form action="{{ action('EventOccurrenceController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Event Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4" placeholder="Describe this event for us."></textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" />
        </div>
        <div class="form-group">
            <label for="timeend">End date / time</label>
            <input type="text" id="endPicker" class="form-control" name="timeend" />
        </div>
        <div class="form-group".
            <label for="tour">Tour</label><br />
            <p>Here we need to use a single-select method listing available tours.</p>
            <select class="form-control" name="tour">
            @foreach ($tours as $tour)
                <option value="{{ $tour->id }}">{{ $tour->namefull }} </option>
            @endforeach
            </select>
        </div>
        <div class="form-group".
            <label for="location">Location</label><br />
            <p>Here we need to use a single-select method listing available locations.</p>
            <select class="form-control" name="location">
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->namefull }} </option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('EventOccurrenceController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop