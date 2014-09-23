@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $event->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('EventController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="event" value="{{ $event->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('EventController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 