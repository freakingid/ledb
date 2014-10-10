@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Performance</h1>
    </div>
    
    <form action="{{ action('PerformanceController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Performance Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4" placeholder="Describe this performance for us."></textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" />
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
            <label for="tour">Artwork</label><br />
            <select class="form-control" name="artwork">
            @foreach ($artworks as $artwork)
                <option value="{{ $artwork->id }}">{{ $artwork->namefull }} </option>
            @endforeach
            </select>
        </div>
        <div class="form-group".
            <label for="location">Event</label><br />
            <select class="form-control" name="event">
            @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->namefull }} </option>
            @endforeach
            </select>
        </div>
        <div class="form-group".
            <label for="actors">Actor(s)</label><br />
            <select class="form-control" multiple name="actor[]">
            @foreach ($people as $person)
                <option value="{{ $person->id }}">{{ $person->namefirst . ' ' . $person->namelast }} </option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('PerformanceController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop