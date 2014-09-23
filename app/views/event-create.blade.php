@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Event</h1>
    </div>
    
    <form action="{{ action('EventController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="title" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Event Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea  name="description" rows="4" cols="50">
            Default description? Or placeholder please.
            </textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" class="form-control" name="timestart" value="Replace with datepicker" />
        </div>
        <div class="form-group">
            <label for="timeend">End date / time</label>
            <input type="text" class="form-control" name="timeend" value="Replace with datepicker" />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('EventController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop