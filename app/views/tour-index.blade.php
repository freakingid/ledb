@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Tours</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('TourController@create') }}" class="btn btn-primary">Create Tour</a>
        </div>
    </div>
    
    @if ($tours->isEmpty())
        <p>There are no tours! <small>BUMMER</small></p>
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
                @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->slug }}</td>
                    <td>{{ $tour->namefull }}</td>
                    <td>{{ $tour->timestart }}</td>
                    <td>{{ $tour->timeend }}</td>
                    <td>
                        <a href="{{ action('TourController@edit', $tour->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('TourController@delete', $tour->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop