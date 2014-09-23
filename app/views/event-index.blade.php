@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Events</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('EventController@create') }}" class="btn btn-primary">Create Event</a>
        </div>
    </div>
    
    @if ($events->isEmpty())
        <p>There are no events! <small>BUMMER</small></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->slug }}</td>
                    <td>{{ $event->namefull }}</td>
                    <td>{{ $event->timestart }}</td>
                    <td>{{ $event->timeend }}</td>
                    <td>
                        <a href="{{ action('EventController@edit', $event->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('EventController@delete', $event->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop