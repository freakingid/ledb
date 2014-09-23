@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Performance</h1>
    </div>
    
    <form action="{{ action('PerformanceController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="title" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Performance Name</label>
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
            <label for="rating">Rating</label>
            <input type="radio" name="rating" value="0">0<br />
            <input type="radio" name="rating" value="1">1<br />
            <input type="radio" name="rating" value="2">2<br />
            <input type="radio" name="rating" value="3">3<br />
            <input type="radio" name="rating" value="4">4<br />
            <input type="radio" name="rating" value="5">5<br />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('PerformanceController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop