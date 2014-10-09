@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Tour</h1>
    </div>
    
    <form action="{{ action('TourController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Tour Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4" placeholder="Tell us about this tour in general."></textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" />
        </div>
        <div class="form-group">
            <label for="timeend">End date / time</label>
            <input type="text" id="endPicker" class="form-control" name="timeend" />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('TourController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop